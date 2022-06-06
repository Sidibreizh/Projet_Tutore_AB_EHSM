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

/**
 *
 * @author elyes
 */
public class Promotions {
    
    public static int recupIdSolde(int solde){
       
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "select idSolde from solde where pourcentage_Solde = " +solde;
        try{
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
            ResultSet res = pst.executeQuery();
            if(res.next()) {
                int id = res.getInt("idSolde");
                connection.close();
                return id;
            }
        } catch (SQLException e) {
            System.out.println(e); 
        }
        return  9999;
    }
    
    public static boolean addSolde(int pourcent){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "insert into solde(pourcentage_Solde) values (?)";
        try {
                Connection connection = DriverManager.getConnection(url, "root", "");
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                pst.setInt(1,pourcent);
                pst.execute();
                connection.close();
                return(true);                                
            } catch (SQLException e) {
                System.out.println(e);
                return(false);
        }    
    }
    
    public static boolean modifSolde(int idSolde, int pourcentage_Solde){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "update solde set pourcentage_Solde = ? where idSolde="+ idSolde;
        
        try {
                Connection connection = DriverManager.getConnection(url, "root", "");
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                pst.setInt(1,pourcentage_Solde);
                pst.execute();
                connection.close();
                return(true);                                
            } catch (SQLException e) {
                System.out.println(e);
                return(false);
        }
    }
    
    public static boolean delSolde(int idSolde){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "delete from solde where idSolde=?";
        try{
                Connection connection = DriverManager.getConnection(url, "root", "");
                PreparedStatement pstProd = (PreparedStatement) connection.prepareStatement(sql);
                pstProd.setInt(1,idSolde);
                pstProd.execute();
                return(true);
        } catch (SQLException e) {
                System.out.println(e);      
        }
        return(false);
    }        
}
