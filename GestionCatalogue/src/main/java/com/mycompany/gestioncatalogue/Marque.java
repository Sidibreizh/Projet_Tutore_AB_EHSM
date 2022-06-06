/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.gestioncatalogue;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;

/**
 *
 * @author elyes
 */
public class Marque {
    
    public static ArrayList<String> getMarque(){
        
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlMarque = "select nom from marque";
        ArrayList<String> listeMarque = new ArrayList<>();
        
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sqlMarque);
            ResultSet res = pst.executeQuery();
            while(res.next()){
                String nom = res.getString("nom");
                listeMarque.add(nom);
            }
            connection.close();
        }catch(SQLException e){
            System.out.println(e);
        }
        return listeMarque;
    }
    
    
    public static int getIdMarque(String marque){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlMarque = "select idMarque from marque where nom = '" + marque +"'";
        
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sqlMarque);
            ResultSet res = pst.executeQuery();
            while(res.next()){
                int idMarque = res.getInt("idMarque");
                return idMarque;
            }
            connection.close();
        }catch(SQLException e){
            System.out.println(e);
        }
        return 999;
    }
    
    public static String getMarque(int idMarque){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlMarque = "select nom from marque where idMarque = " + idMarque;
        
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sqlMarque);
            ResultSet res = pst.executeQuery();
            while(res.next()){
                String marque = res.getString("nom");
                return marque;
            }
            connection.close();
        }catch(SQLException e){
            System.out.println(e);
        }
        return "null";
    }
}
