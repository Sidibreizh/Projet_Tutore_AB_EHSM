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
public class Connexion {
    
    public static boolean checkConnexion(String user, String pwd){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "select mdpCompte from compte_utilisateur where pseudoCompte = '" + user + "'" ;
        try{
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
            ResultSet res = pst.executeQuery();
            if(res.next()){
                String mdp = res.getString("mdpCompte");
                connection.close();
                if(mdp.equals(pwd)){
                    return true;
                }
            }
        } catch (SQLException e) {
            System.out.println(e); 
        }
        return false;
    }  
    
    public static boolean roleConnexion(String user){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "select idRole from utilisateur join compte_utilisateur USING (idUtilisateur) where pseudoCompte = '" + user + "'" ;
        try{
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
            ResultSet res = pst.executeQuery();
            if(res.next()){
                int id = res.getInt("idRole");
                if(id == 1){
                    return true; 
                }
                connection.close();
            }
        } catch (SQLException e) {
            System.out.println(e); 
        }
        return false;
    }
}
