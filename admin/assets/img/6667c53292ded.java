package com.example.afinal;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

public class count extends AppCompatActivity {
    Button BtnToast, BtnCount, BtnCount2, btnreset;
    TextView TeksCount;
    Integer angka=0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.count);

        BtnToast = findViewById(R.id.button_toast);
        BtnCount = findViewById(R.id.button_count);
        BtnCount2 = findViewById(R.id.button_count2);
        btnreset=findViewById(R.id.btnreset);
        TeksCount = findViewById(R.id.show_count);



        BtnToast.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View view){
                Toast.makeText(count.this,"Hello aku Toast", Toast.LENGTH_SHORT).show();

            }
        });

        BtnCount.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View view){
                Hitung();

            }
        });
        BtnCount2.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View view){
                Hitungmundur();

            }
        });

        btnreset.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                reset();

            }
        });
    }
    public void Hitung(){
        angka = angka + 1;
        TeksCount.setText(String.valueOf(angka));

    }
    public void  Hitungmundur(){

        if(angka==0){
            Toast.makeText(count.this,"Sudah Mencapai Angka 0", Toast.LENGTH_SHORT).show();

        }else {
            angka = angka - 1;
        }
        TeksCount.setText(String.valueOf(angka));
    }

    public void reset(){
        TeksCount.setText("0");
        angka=0;

    }
}