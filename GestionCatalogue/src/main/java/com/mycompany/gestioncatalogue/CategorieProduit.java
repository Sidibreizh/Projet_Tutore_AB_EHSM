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
import java.sql.SQLException;

/**
 *
 * @author elyes
 */
public class CategorieProduit{
    
    public static ArrayList<String> getCategorie(){
        
        ArrayList<String> listeCat = new ArrayList<>();
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
            connection.close();
        }catch(SQLException e){
            System.out.println(e);
        }
        return listeCat;
    }
    
    public static ArrayList<String> getSsCategorie(String s){
        
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        
        ArrayList<String> listeSsCat = new ArrayList<>();
        
        String sqlSsCat = "select nomSsCategorie from souscategorie_produit join categorie_produit using(idCategorie) where nomCategorie = '"+ s +"'";
        
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pstCat = (PreparedStatement) connection.prepareStatement(sqlSsCat);
            ResultSet resSsCat = pstCat.executeQuery();
            while(resSsCat.next()){
                String Sscategorie = resSsCat.getString("nomSsCategorie");
                listeSsCat.add(Sscategorie);
            }
            connection.close();
        }catch(SQLException e){
            System.out.println(e);
        }
        return listeSsCat;
    }
    
    public static ArrayList<String> getTotalSsCategorie(){
        
        ArrayList<String> listeSsCat = new ArrayList<>();
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
            connection.close();
        }catch(SQLException e){
            System.out.println(e);
        }
        return listeSsCat;
    }
    
    public static int getIdCategorie(String s){
    
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlIdCat = "select idCategorie from categorie_produit where nomCategorie = '" + s + "'";
        
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pstIdCat = (PreparedStatement) connection.prepareStatement(sqlIdCat);
            ResultSet resIdCat = pstIdCat.executeQuery();
            while(resIdCat.next()){
            int idCat = resIdCat.getInt("idCategorie");
            connection.close();
            return idCat;
            }
        }catch(SQLException e){
            System.out.println(e);
        }        
        return 0;
    }
    
    public static int getIdSsCategorie(String s){
        
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlIdCat = "select idSsCategorie from souscategorie_produit where nomSsCategorie = '" + s + "'";
        
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pstIdCat = (PreparedStatement) connection.prepareStatement(sqlIdCat);
            ResultSet resIdCat = pstIdCat.executeQuery();
            while(resIdCat.next()){
                int idSsCat = resIdCat.getInt("idSsCategorie");
                connection.close();
                return idSsCat;
             }
        }catch(SQLException e){
            System.out.println(e);
        }
        return 0;
    }
    
    public static boolean addCat(String nomCategorie, String imgCat){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "insert into categorie_produit(nomCategorie,imgCat) values (?,?)";
        try {
                Connection connection = DriverManager.getConnection(url, "root", "");
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                pst.setString(1,nomCategorie);
                pst.setString(2, imgCat);
                pst.execute();
                connection.close();
                return(true);                                
            } catch (SQLException e) {
                System.out.println(e);
                return(false);
        }    
    }
    
    public static boolean addSsCat(int idcat,String nom,String image){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "insert into souscategorie_produit(idCategorie,nomSsCategorie,imgSsCat) values (?,?,?)";
        try {
                Connection connection = DriverManager.getConnection(url, "root", "");
                PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
                pst.setInt(1,idcat);
                pst.setString(2,nom);
                pst.setString(3, image);
                pst.execute();
                connection.close();
                return(true);                                
            } catch (SQLException e) {
                System.out.println(e);
                return(false);
        }    
    }
    
    public static boolean modifCat(int idCat, String nomCategorie, String imgCat){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "update categorie_produit set nomCategorie = ?,imgCat = ? where idCategorie="+ idCat;
        
        try {
                Connection connection = DriverManager.getConnection(url, "root", "");
                PreparedStatement pstCat = (PreparedStatement) connection.prepareStatement(sql);
                pstCat.setString(1,nomCategorie);
                pstCat.setString(2,imgCat);
                pstCat.execute();
                connection.close();
                return(true);                                
            } catch (SQLException e) {
                System.out.println(e);
                return(false);
        }
    }
    
    public static boolean modifSsCat(int idSsCat, String nomSsCategorie, String imgSsCat){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "update souscategorie_produit set nomSsCategorie = ?,imgSsCat = ? where idSsCategorie="+ idSsCat;
        
        try {
                Connection connection = DriverManager.getConnection(url, "root", "");
                PreparedStatement pstCat = (PreparedStatement) connection.prepareStatement(sql);
                pstCat.setString(1,nomSsCategorie);
                pstCat.setString(2,imgSsCat);
                pstCat.execute();
                connection.close();
                return(true);                                
            } catch (SQLException e) {
                System.out.println(e);
                return(false);
        }
    }
 
    public static boolean delCat(String nomCategorie){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "delete from categorie_produit where nomCategorie=?";
        try{
                Connection connection = DriverManager.getConnection(url, "root", "");
                PreparedStatement pstProd = (PreparedStatement) connection.prepareStatement(sql);
                pstProd.setString(1, nomCategorie);
                pstProd.execute();
                return(true);
        } catch (SQLException e) {
                System.out.println(e);      
        }
        return(false);
    }        
    
    public static boolean delSsCat(String nomSsCategorie){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "delete from souscategorie_produit where nomSsCategorie=?";
        try{
                Connection connection = DriverManager.getConnection(url, "root", "");
                PreparedStatement pstProd = (PreparedStatement) connection.prepareStatement(sql);
                pstProd.setString(1, nomSsCategorie);
                pstProd.execute();
                return true;
        } catch (SQLException e) {
                System.out.println(e);      
        }
        return(false);
    }        
    
    public static String imageCat(String nomCategorie){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "select imgCat from categorie_produit where nomCategorie = '" + nomCategorie + "'";
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
            ResultSet res = pst.executeQuery();
            while(res.next()){
                String img = res.getString("imgCat");
                connection.close();
                return img;
             }
        }catch(SQLException e){
            System.out.println(e);
        }
        return "null";
    }
    
    public static String imageSsCat(String nomSsCategorie){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "select imgSsCat from souscategorie_produit where nomSsCategorie = '" + nomSsCategorie + "'";
        try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
            ResultSet res = pst.executeQuery();
            while(res.next()){
                String img = res.getString("imgSsCat");
                connection.close();
                return img;
             }
        }catch(SQLException e){
            System.out.println(e);
        }
        return "null";
    }
}
