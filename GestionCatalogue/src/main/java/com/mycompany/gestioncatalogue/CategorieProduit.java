/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.gestioncatalogue;

import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.sql.Connection;

/**
 *
 * @author elyes
 */
public class CategorieProduit{
    
    public static ArrayList<String> getCategorie(){
        
        ArrayList<String> listeCat = new ArrayList<String>();
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlCat = "select * from categorie_produit";
        
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pstCat = (PreparedStatement) connection.prepareStatement(sqlCat);
            ResultSet resCat = pstCat.executeQuery();
            while(resCat.next()){
                String categorie = resCat.getString("nomCategorie");
                listeCat.add(categorie);
            }
        }catch(Exception e){
            System.out.println(e);
        }
        return listeCat;
    }
    
    public static ArrayList<String> getSsCategorie(String s){
        
        ArrayList<String> listeSsCat = new ArrayList<String>();
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlSsCat = "select nomSsCategorie from souscategorie_produit join categorie_produit using(idCategorie) where nomCategorie = '"+ s +"'";
        
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pstCat = (PreparedStatement) connection.prepareStatement(sqlSsCat);
            ResultSet resSsCat = pstCat.executeQuery();
            while(resSsCat.next()){
                String Sscategorie = resSsCat.getString("nomSsCategorie");
                listeSsCat.add(Sscategorie);
            }
        }catch(Exception e){
            System.out.println(e);
        }
        return listeSsCat;
    }
    
    public static ArrayList<String> getTotalSsCategorie(){
        
        ArrayList<String> listeSsCat = new ArrayList<String>();
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlSsCat = "select nomSsCategorie from souscategorie_produit join categorie_produit using(idCategorie)";
        
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pstCat = (PreparedStatement) connection.prepareStatement(sqlSsCat);
            ResultSet resSsCat = pstCat.executeQuery();
            while(resSsCat.next()){
                String Sscategorie = resSsCat.getString("nomSsCategorie");
                listeSsCat.add(Sscategorie);
            }
        }catch(Exception e){
            System.out.println(e);
        }
        return listeSsCat;
    }
}
