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
public class Solde {
    
    public static ArrayList<Integer> getSolde(){
        
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlSolde = "select pourcentage_Solde from solde";
        ArrayList<Integer> listeSolde = new ArrayList<>();
        
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pstSolde = (PreparedStatement) connection.prepareStatement(sqlSolde);
            ResultSet resSolde = pstSolde.executeQuery();
            while(resSolde.next()){
                int solde = resSolde.getInt("pourcentage_Solde");
                listeSolde.add(solde);
            }
            connection.close();
        }catch(SQLException e){
            System.out.println(e);
        }
        return listeSolde;
    }
    
    public static int getSolde(int idSolde){
        
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlSolde = "select pourcentage_Solde from solde where idSolde = " + idSolde;
        
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pstSolde = (PreparedStatement) connection.prepareStatement(sqlSolde);
            ResultSet resSolde = pstSolde.executeQuery();
            while(resSolde.next()){
                int solde = resSolde.getInt("pourcentage_Solde");
                return solde;
            }
            connection.close();
        }catch(SQLException e){
            System.out.println(e);
        }
        return 9999;
    }
    
    public static int getIdSolde(int pourcentage){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlSolde = "select idSolde from solde where pourcentage_solde = " + pourcentage;
        
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sqlSolde);
            ResultSet res = pst.executeQuery();
            while(res.next()){
                int idsolde = res.getInt("idSolde");
                return idsolde;
            }
            connection.close();
        }catch(SQLException e){
            System.out.println(e);
        }
        return 999;
    }
    
    public static int getIdSolde(String pourcentage){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlSolde = "select idSolde from solde where pourcentage_solde = '" + pourcentage +"'";
        
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sqlSolde);
            ResultSet res = pst.executeQuery();
            while(res.next()){
                int idsolde = res.getInt("idSolde");
                return idsolde;
            }
            connection.close();
        }catch(SQLException e){
            System.out.println(e);
        }
        return 999;
    }
}
