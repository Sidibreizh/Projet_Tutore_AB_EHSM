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
public class Stocks {
    
    private int idProduit, quantite, seuilMin, seuilMax;
    
    public Stocks(int quantite,int seuilMin,int seuilMax){
        this.quantite = quantite;
        this.seuilMin = seuilMin;
        this.seuilMax = seuilMax;
    }
    
    public static boolean creeStock(int idProduit, int quantite,int seuilMin,int seuilMax){       
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlStock = "insert into stocks(idProduit,quantite,quantiteMin,quantiteMax) values (?,?,?,?)";
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pstStock = (PreparedStatement) connection.prepareStatement(sqlStock);
            pstStock.setInt(1,idProduit);
            pstStock.setInt(2,quantite);
            pstStock.setInt(3, seuilMin);
            pstStock.setInt(4, seuilMax);
            pstStock.execute();
            connection.close();
            return(true);
        }catch(SQLException e){
            System.out.println(e);
            return(false);
        }  
    }
    
    public static ArrayList<Integer> getStock(int idProduit) { // recuperation des donnees sql vers java
        
        String sqlStock = "select quantite, quantiteMin, quantiteMax from stocks where idProduit =" + idProduit + "" ;
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        ArrayList<Integer> listeStocks = new ArrayList<>();
        
        try{
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sqlStock);
            ResultSet res = pst.executeQuery();
            if(res.next()) {
                int quantite = res.getInt("quantite"); 
                listeStocks.add(quantite);
                int quantiteMin = res.getInt("quantiteMin");
                listeStocks.add(quantiteMin);
                int quantiteMax = res.getInt("quantiteMax");
                listeStocks.add(quantiteMax);
                connection.close();
                return listeStocks;
            }
        } catch (SQLException e) {
            System.out.println(e);
        }
        return null;
    }
    
    public static boolean modifStock(int idProduit, int quantite,int seuilMin,int seuilMax){       
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlStock = "update stocks set quantite = ?,quantiteMin = ?,quantiteMax = ? where idProduit = "+ idProduit;
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pstStock = (PreparedStatement) connection.prepareStatement(sqlStock);
            pstStock.setInt(1,quantite);
            pstStock.setInt(2, seuilMin);
            pstStock.setInt(3, seuilMax);
            pstStock.execute();
            connection.close();
            return(true);
        }catch(SQLException e){
            System.out.println(e);
            return(false);
        }  
    }
    
    public static boolean supprProduit(int idProduit){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "delete from stocks where idProduit=?" ;
        try{
                Connection connection = DriverManager.getConnection(url, "root", "");
                PreparedStatement pst= (PreparedStatement) connection.prepareStatement(sql);
                pst.setInt(1, idProduit);
                pst.execute();
                return(true);
        } catch (SQLException e) {
                System.out.println(e);      
        }
        return(false);
    }  
}