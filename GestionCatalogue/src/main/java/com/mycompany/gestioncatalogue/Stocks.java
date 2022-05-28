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
public class Stocks {
    public static boolean creeStock(int quantite,int seuilMin,int seuilMax){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlStock = "insert into stocks(quantite,quantiteMin,quantiteMax) values (?,?,?)";
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pstStock = (PreparedStatement) connection.prepareStatement(sqlStock);
            ResultSet resStock = pstStock.executeQuery();
            while(resStock.next()){
            resStock.getInt("pourcentage_Solde");
            }
        }catch(SQLException e){
            System.out.println(e);
            return false;
        } 
}
