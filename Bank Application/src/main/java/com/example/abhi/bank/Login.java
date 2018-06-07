package com.example.abhi.bank;

import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class Login extends AppCompatActivity {

    TextView userSignup ;
    SQLiteDatabase db;
    SQLiteOpenHelper mOpenHelper;
    Button login;
    EditText cardNum,password;
    Cursor mCursor;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        mOpenHelper = new DataBase(this);
        db= mOpenHelper.getReadableDatabase();

        login = (Button)findViewById(R.id.btnLogin);
        cardNum = (EditText)findViewById(R.id.edtCardNum);
        password = (EditText)findViewById(R.id.edtLoginPassword);

        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                String cnum = cardNum.getText().toString();
                String pwd = password.getText().toString();

                boolean value = false;
                if(cnum.isEmpty() && pwd.isEmpty()){
                    Toast.makeText(Login.this,"Please Enter All The Details For Login", Toast.LENGTH_SHORT).show();
                    cardNum.setError("Must Enter Card Number!");
                    password.setError("Must Enter Password!");
                }
                else{
                    value=true;
                    mCursor = db.rawQuery("SELECT * FROM "+ DataBase.TABLE_NAME + " WHERE " + DataBase.COL_4 + "=? AND " + DataBase.COL_6 + "=?", new String[]{cnum,pwd});
                    if(mCursor!=null) {
                        if (mCursor.getCount() > 0) {
                            mCursor.moveToNext();
                            Toast.makeText(getApplicationContext(), "Login Successfull !!!", Toast.LENGTH_LONG).show();
                           Intent myintent = new Intent(Login.this,DisplayAccountDetail.class);
                            startActivity(myintent);
                        } else {
                            Toast.makeText(getApplicationContext(), "Sorry Unable To Login !!!", Toast.LENGTH_LONG).show();
                        }

                    }
                }
            }
        });

        userSignup = (TextView) findViewById(R.id.txtRegister);
        userSignup.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Login.this,SignUp.class);
                startActivity(intent);
            }
        });


    }

}
