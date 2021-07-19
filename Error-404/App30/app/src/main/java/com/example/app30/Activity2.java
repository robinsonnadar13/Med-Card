package com.example.app30;

import androidx.appcompat.app.AppCompatActivity;

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


public class Activity2 extends AppCompatActivity {

    private Button scan_btn1;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_2);
        scan_btn1 = (Button)findViewById(R.id.button3);
        final Activity activity = this;
        scan_btn1.setOnClickListener(new View.OnClickListener() {
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
}
