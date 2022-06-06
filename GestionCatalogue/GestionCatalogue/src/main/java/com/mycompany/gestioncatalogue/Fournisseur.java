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
public class Fournisseur {
    
     public static ArrayList<String> getFournisseur(){
        
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlFourni = "select nomFournisseur from fournisseur";
        ArrayList<String> listeMFournisseur = new ArrayList<>();
        
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pstSolde = (PreparedStatement) connection.prepareStatement(sqlFourni);
            ResultSet res = pstSolde.executeQuery();
            while(res.next()){
                String nomFournisseur = res.getString("nomFournisseur");
                listeMFournisseur.add(nomFournisseur);
            }
            connection.close();
        }catch(SQLException e){
            System.out.println(e);
        }
        return listeMFournisseur;
    }
    
    public static int getIdFournisseur(String fournisseur){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlFourni = "select idFournisseur from fournisseur where nomFournisseur = '" + fournisseur +"'";
        
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sqlFourni);
            ResultSet res = pst.executeQuery();
            while(res.next()){
                int idFournisseur = res.getInt("idFournisseur");
                return idFournisseur;
            }
            connection.close();
        }catch(SQLException e){
            System.out.println(e);
        }
        return 999;
    }
    
    public static String getFournisseur(int idFournisseur){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlFourni = "select nomFournisseur from fournisseur where idFournisseur = " + idFournisseur;
        
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sqlFourni);
            ResultSet res = pst.executeQuery();
            while(res.next()){
                String nomFournisseur = res.getString("nomFournisseur");
                return nomFournisseur;
            }
            connection.close();
        }catch(SQLException e){
            System.out.println(e);
        }
        return "null";
    }
}
