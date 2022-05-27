/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.gestioncatalogue;

import IHM.IHM_Catalogue;
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
public class Produits {
    private int idSsCat, idMarque, idFournisseur, idSolde, etatSolde;
    private float prix, prixSolde;
    private String nom, descriptionCat,imgCat,descriptionSsCat, imgSsCat;
    
   /* public Produits(int idSsCat, int idMarque, int idFournisseur, int idSolde, String nom, float prix, float prixSolde, int etatSolde, String descriptionCat, String imgCat, String descriptionSsCat, String imgSsCat){
        this.idSsCat = idSsCat;
        this.idMarque = idMarque;
        this.idFournisseur = idFournisseur;
        this.idSolde = idSolde;
        this.nom = nom;
        this.prix = prix;
        this.prixSolde = prixSolde;
        this.etatSolde = etatSolde;
        this.descriptionCat = descriptionCat;
        this.imgCat = imgCat;
        this.descriptionSsCat = descriptionSsCat;
        this.imgSsCat = imgSsCat;
        
    }*/
    
    public static float Solde(float prix, int idSolde){
         String url = "jdbc:mysql://localhost:3306/croquetteatemps";
         String sqlSolde = "select pourcentage_Solde from solde where idSolde = '"+idSolde+"'";
         
         try {
            Connection connection = DriverManager.getConnection(url, "root", "");
            PreparedStatement pstSolde = (PreparedStatement) connection.prepareStatement(sqlSolde);
            ResultSet resSolde = pstSolde.executeQuery();
            while(resSolde.next()){
            int Solde = resSolde.getInt("pourcentage_Solde");
            return (prix-prix*Solde/100);
            }
        }catch(SQLException e){
            System.out.println(e);
        } 
         return 0f;
    }
    

   public static boolean creeProduit(int idSsCat, int idMarque, int idFournisseur, int idSolde, String nom, float prix, float prixSolde, int etatSolde, String description, String img){
        
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlPro = "insert into produit(idSsCategorie,idMarque,idFournisseur,idSolde,nom,prix,prixSolde,etatSolde,description,img) values (?,?,?,?,?,?,?,?,?,?)";
              
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
                pstProd.setInt(9, etatSolde);
                pstProd.setString(10, description);
                pstProd.setString(8, img);
                pstProd.execute();
                
                return(true);
                                
            } catch (SQLException e) {
                System.out.println(e);
                return(false);
        }
   }  
}
