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
public class Clients {

    public static int getIdClient(String n, String p){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "select idUtilisateur from utilisateur where nomClient LIKE '" + n + "%' AND prenomClient LIKE '" + p + "%'" ;
        
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
            ResultSet res = pst.executeQuery();
            while(res.next()){
                int idUtilisateur = res.getInt("idUtilisateur");
                return idUtilisateur;
            }
            connection.close();
        }catch(SQLException e){
            System.out.println(e);
        }
        return 9999;
    }
    
     public static String getNomClient(String n){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "select nomClient from utilisateur where nomClient LIKE '" + n + "%'" ;
        
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
            ResultSet res = pst.executeQuery();
            while(res.next()){
                String nom = res.getString("nomClient");
                return nom;
            }
            connection.close();
        }catch(SQLException e){
            System.out.println(e);
        }
        return "null";
    }
     
     public static String getPrenomClient(String p){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "select prenomClient from utilisateur where prenomClient LIKE '" + p + "%'" ;
        
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
            ResultSet res = pst.executeQuery();
            while(res.next()){
                String prenom = res.getString("prenomClient");
                return prenom;
            }
            connection.close();
        }catch(SQLException e){
            System.out.println(e);
        }
        return "null";
    }
    
    public static String getPseudo(int idUser){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "select pseudoCompte from compte_utilisateur where idUtilisateur =" + idUser;
        
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
            ResultSet res = pst.executeQuery();
            while(res.next()){
                String pseudo = res.getString("pseudoCompte");
                return pseudo;
            }
            connection.close();
        }catch(SQLException e){
            System.out.println(e);
        }
        return "null";
    }
    
    public static boolean delUser(int u){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "delete from utilisateur where idUtilisateur=?";
        try{
                Connection connection = DriverManager.getConnection(url, "root", "");
                PreparedStatement pstProd = (PreparedStatement) connection.prepareStatement(sql);
                pstProd.setInt(1, u);
                pstProd.execute();
                return(true);
        } catch (SQLException e) {
                System.out.println(e);      
        }
        return(false);
    }    
    
    public static boolean delPseudo(int u){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "delete from compte_utilisateur where idUtilisateur=?";
        try{
                Connection connection = DriverManager.getConnection(url, "root", "");
                PreparedStatement pstProd = (PreparedStatement) connection.prepareStatement(sql);
                pstProd.setInt(1, u);
                pstProd.execute();
                return(true);
        } catch (SQLException e) {
                System.out.println(e);      
        }
        return(false);
    }  
}    