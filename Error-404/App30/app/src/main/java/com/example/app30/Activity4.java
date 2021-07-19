package com.example.app30;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class Activity4 extends AppCompatActivity {

    private Button button5;
    private TextView username;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_4);

        button5 = (Button) findViewById(R.id.button5);
            button5.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    openActivity5();
                }
            });



    }

    @Nullable
    public void openActivity5(){
        Intent intent = new Intent(this, Activity5.class);
        startActivity(intent);
    }

}
