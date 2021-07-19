package com.example.app30;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.os.Bundle;
import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;
import com.google.zxing.integration.android.IntentIntegrator;
import com.google.zxing.integration.android.IntentResult;
import android.net.Uri;


public class Activity3 extends AppCompatActivity {

    private Button scan_btn5;
    private Button button6;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_3);


        button6 = (Button) findViewById(R.id.button6);
        button6.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                openActivity6();
            }
        });


        scan_btn5 = (Button)findViewById(R.id.button5);
        final Activity activity = this;
        scan_btn5.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                IntentIntegrator integrator=new IntentIntegrator(activity);
                integrator.setDesiredBarcodeFormats(IntentIntegrator.QR_CODE_TYPES);
                integrator.setPrompt("Place the QR code inside the rectangle area");
                integrator.setCameraId(0);
                integrator.setBeepEnabled(false);
                integrator.setBarcodeImageEnabled(false);
                integrator.initiateScan();
            }
        }
        );


    }

    @Override
    protected void onActivityResult(int requestCode,int resultCode,Intent data)
    {
        IntentResult result=IntentIntegrator.parseActivityResult(requestCode,resultCode,data);
        if(result!=null){
            if(result.getContents()==null){
                Toast.makeText(this,"You cancelled the scanning",Toast.LENGTH_LONG).show();
            }
            else{
                Intent browserIntent=new Intent(Intent.ACTION_VIEW,Uri.parse(result.getContents()));
                startActivity(browserIntent);
            }
        }
        else{
            super.onActivityResult(requestCode,resultCode,data);
        }
    }

    @Nullable
    public void openActivity4(){
        Intent intent = new Intent(this, Activity4.class);
        startActivity(intent);
    }

    @Nullable
    public void openActivity6(){
        Intent intent = new Intent(this, Activity6.class);
        startActivity(intent);
    }


}
