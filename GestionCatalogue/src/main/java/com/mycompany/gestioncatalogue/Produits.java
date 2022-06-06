/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.gestioncatalogue;

import java.sql.Connection;
import java.sql.Date;
import java.time.LocalDate;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

/**
 *
 * @author elyes
 */
public class Produits {
    private int idProduit, idSsCategorie, idMarque, idFournisseur,idSolde, etatSolde;
    private String nom, descriptionProd, imgProd;
    private float prix, prixSolde;
    private Date date;
    
    public Produits(int idProduit, int idSsCategorie, int idMarque, int idFournisseur,int idSolde, String nom, float prix, float prixSolde, int etatSolde , String descriptionProd, String imgProd,Date date){
        this.idProduit = idProduit;
        this.idSsCategorie = idSsCategorie;
        this.idMarque = idMarque;
        this.idFournisseur = idFournisseur;
        this.idSolde = idSolde;
        this.etatSolde = etatSolde;
        this.nom = nom;
        this.descriptionProd = descriptionProd; 
        this.imgProd = imgProd;
        this.prix= prix;
        this.prixSolde = prixSolde;
        this.date = date;
    }

    public int getIdProduit() {
        return idProduit;
    }

    public int getIdSsCategorie() {
        return idSsCategorie;
    }

    public int getIdMarque() {
        return idMarque;
    }

    public void setIdProduit(int idProduit) {
        this.idProduit = idProduit;
    }

    public void setIdSsCategorie(int idSsCategorie) {
        this.idSsCategorie = idSsCategorie;
    }

    public void setIdMarque(int idMarque) {
        this.idMarque = idMarque;
    }

    public void setIdFournisseur(int idFournisseur) {
        this.idFournisseur = idFournisseur;
    }

    public void setIdSolde(int idSolde) {
        this.idSolde = idSolde;
    }

    public void setEtatSolde(int etatSolde) {
        this.etatSolde = etatSolde;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public void setDescriptionProd(String descriptionProd) {
        this.descriptionProd = descriptionProd;
    }

    public void setImgProd(String imgProd) {
        this.imgProd = imgProd;
    }

    public void setPrix(float prix) {
        this.prix = prix;
    }

    public void setPrixSolde(float prixSolde) {
        this.prixSolde = prixSolde;
    }

    public void setDate(Date date) {
        this.date = date;
    }

    public int getIdFournisseur() {
        return idFournisseur;
    }

    public int getIdSolde() {
        return idSolde;
    }

    public int getEtatSolde() {
        return etatSolde;
    }

    public String getNom() {
        return nom;
    }

    public String getDescriptionProd() {
        return descriptionProd;
    }

    public String getImgProd() {
        return imgProd;
    }

    public float getPrix() {
        return prix;
    }

    public float getPrixSolde() {
        return prixSolde;
    }

    public Date getDate() {
        return date;
    }

    public static LocalDate dateProduit(){
            LocalDate aujourdhui = LocalDate.now();
            return aujourdhui;
    }

   public static boolean creeProduit(int idSsCat, int idMarque, int idFournisseur, int idSolde, String nom, float prix, float prixSolde, int etatSolde, String description, String img, LocalDate date){
        
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlPro = "insert into produit(idSsCategorie,idMarque,idFournisseur,idSolde,nom,prix,prixSolde,etatSolde,descriptionProd,imgProd,date) values (?,?,?,?,?,?,?,?,?,?,?)";
              
        try {
                Connection connection = DriverManager.getConnection(url, "root", "");
                PreparedStatement pstProd = (PreparedStatement) connection.prepareStatement(sqlPro);
                pstProd.setInt(1,idSsCat);
                pstProd.setInt(2, idMarque);
                pstProd.setInt(3, idFournisseur);
                pstProd.setInt(4, idSolde);
                pstProd.setString(5, nom);
                pstProd.setFloat(6, prix);
                pstProd.setFloat(7, prixSolde);
                pstProd.setInt(8, etatSolde);
                pstProd.setString(9, description);
                pstProd.setString(10, img);
                pstProd.setDate(11, Date.valueOf(date));
                pstProd.execute();
                connection.close();
                return(true);                                
            } catch (SQLException e) {
                System.out.println(e);
                return(false);
        }
   }  
   
   public static int recupIdProduit(){
       
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "select idProduit from produit ORDER BY idProduit Desc LIMIT 1" ;
        try{
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
            ResultSet res = pst.executeQuery();
            if(res.next()) {
                int id = res.getInt("idProduit");
                connection.close();
                return id;
            }
        } catch (SQLException e) {
            System.out.println(e); 
        }
        return  9999;
}
   
   public static String recupIdProduit(String nom){
       
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sql = "select idProduit from produit where nom = '" + nom+ "'" ;
        try{
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
            ResultSet res = pst.executeQuery();
            if(res.next()) {
                int id = res.getInt("idProduit");
                String idString = String.valueOf(id);
                connection.close();
                return idString;
            }
        } catch (SQLException e) {
            System.out.println(e); 
        }
        return  "null";
}
   
   public static Produits getProduit(String libelle) { // recuperation des donnees sql vers java
        String sqlProd = "select * from produit where nom LIKE '" + libelle + "%'" ;
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        
        try{
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sqlProd);
            ResultSet res = pst.executeQuery();
            if(res.next()) {
                Produits p = new Produits(res.getInt("idProduit"), res.getInt("idSsCategorie"), res.getInt("idMarque"),res.getInt("idFournisseur"),
                        res.getInt("idSolde"),res.getString("nom"),res.getFloat("prix"),res.getFloat("prixSolde"),res.getInt("etatSolde"),res.getString("descriptionProd"),res.getString("imgProd"),res.getDate("date"));
                connection.close();
                return p;
            }
        } catch (SQLException e) {
            System.out.println(e);
        }
        return null;
    }
   
   public static float PrixSolde(float prix, int solde){
       return (prix-prix*solde/100);
    }
   
   public static boolean modifProduit(int idProduit,int idSsCat, int idMarque, int idFournisseur, int idSolde, String nom, float prix, float prixSolde, int etatSolde, String description, String img, LocalDate date){
        
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlPro = "update produit set idSsCategorie = ?,idMarque = ?,idFournisseur = ?,idSolde = ?,nom = ?,prix = ?,prixSolde = ?,etatSolde = ?,descriptionProd = ?,imgProd = ?,date = ? where idProduit="+ idProduit;
        
        try {
                Connection connection = DriverManager.getConnection(url, "root", "");
                PreparedStatement pstProd = (PreparedStatement) connection.prepareStatement(sqlPro);
                pstProd.setInt(1,idSsCat);
                pstProd.setInt(2, idMarque);
                pstProd.setInt(3, idFournisseur);
                pstProd.setInt(4, idSolde);
                pstProd.setString(5, nom);
                pstProd.setFloat(6, prix);
                pstProd.setFloat(7, prixSolde);
                pstProd.setInt(8, etatSolde);
                pstProd.setString(9, description);
                pstProd.setString(10, img);
                pstProd.setDate(11, Date.valueOf(date));
                pstProd.execute();
                connection.close();
                return(true);                                
            } catch (SQLException e) {
                System.out.println(e);
                return(false);
        }
   }  
    public static boolean supprProduit(int idProduit){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlPro = "delete from produit where idProduit=?";
        try{
                Connection connection = DriverManager.getConnection(url, "root", "");
                PreparedStatement pstProd = (PreparedStatement) connection.prepareStatement(sqlPro);
                pstProd.setInt(1, idProduit);
                pstProd.execute();
                return(true);
        } catch (SQLException e) {
                System.out.println(e);      
        }
        return(false);
    }
}
    
