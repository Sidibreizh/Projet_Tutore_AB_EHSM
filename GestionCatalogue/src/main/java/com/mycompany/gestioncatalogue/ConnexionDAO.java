/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.gestioncatalogue;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

/**
 *
 * @author elyes
 */
public class ConnexionDAO {
    
    public static  void Connexion(){
    String url = "jdbc:mysql://localhost:3306/croquetteatemps";
    Connection connection;        
        try {
            connection = DriverManager.getConnection(url, "root", "");
            System.out.println("Connexion avec succès");
        } catch (SQLException e) {
            System.out.println(e);
        }  
    }   
}
