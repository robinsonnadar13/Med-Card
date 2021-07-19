package com.example.app30;

import androidx.appcompat.app.AppCompatActivity;

import android.app.Activity;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class Activity6 extends AppCompatActivity {

    EditText username,password;
    Button btnLogin;
    Button register;

    String correct_username = "123456";
    String correct_password = "9276B189";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_6);

    username = findViewById(R.id.username);
    password = findViewById(R.id.password);
    btnLogin = findViewById(R.id.button4);
    register = findViewById(R.id.register);

        register.setOnClickListener(new View.OnClickListener() {
                                        @Override
                                         public void onClick(View v){
                                            Intent intent =new Intent(Intent.ACTION_VIEW,Uri.parse("http://medi-card.freeoda.com/form1.html"));
                                            startActivity(intent);
                                        }
                                    });
    btnLogin.setOnClickListener(new View.OnClickListener() {
        @Override
        public void onClick(View v) {
            if (TextUtils.isEmpty(username.getText().toString()) || TextUtils.isEmpty(password.getText().toString())) {
                Toast.makeText(Activity6.this, "Empty Data Provided", Toast.LENGTH_LONG).show();
            } else if (username.getText().toString().equals(correct_username)) {
                if (password.getText().toString().equals(correct_password)) {
                    Toast.makeText(Activity6.this, "Retrieving Data", Toast.LENGTH_LONG).show();


                    btnLogin.setOnClickListener(new View.OnClickListener() {
                        @Override
                        public void onClick(View v){
                            Intent intent =new Intent(Intent.ACTION_VIEW,Uri.parse("http://medi-card.freeoda.com/upda.html"));
                            startActivity(intent);
                        }
                    });




                } else {
                    Toast.makeText(Activity6.this, "Invalid Hospital ID/RFID", Toast.LENGTH_LONG).show();

                }
            } else {
                Toast.makeText(Activity6.this, "Invalid Hospital ID/RFID", Toast.LENGTH_LONG).show();
            }




            };


        });
    }
}