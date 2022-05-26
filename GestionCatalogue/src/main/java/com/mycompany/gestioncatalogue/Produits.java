/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.gestioncatalogue;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;

/**
 *
 * @author elyes
 */
public class Produits {
    
     public void creeProduit(Produits pr){
         
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        String sqlPro = "insert into produit(idCategorie,idSsCategorie,idMarque,idFournisseur,idSolde,nom,prix,prixSolde,etatSolde,descriptionCat,imgCat,descriptionSsCat,imgSsCat) values (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        String sqlCat = "";
        
        
        try {
                Connection connection = DriverManager.getConnection(url, "root", "");
                PreparedStatement pstProd = (PreparedStatement) connection.prepareStatement(sqlPro);
                pstProd.setInt(1, pr.getIdCategorie());
                pstProd.setInt(2, pr.getIdSsCategorie());
                pstProd.setInt(3, pr.getIdMarque());
                pstProd.setInt(4, pr.getIdFournisseur());
                pstProd.setInt(5, pr.getIdSolde());
                pstProd.setString(6, pr.getNom());
                pstProd.setFloat(7, pr.getPrix());
                pstProd.setString(9, pr.getPrixSolde());
                pstProd.setString(10, pr.getEtatSolde());
                pstProd.setString(8, pr.getDescriptionCat());
                pstProd.setString(11, pr.getImgCat());
                pstProd.setString(12, pr.getDescriptionSsCat());
                pstProd.setString(13, pr.getImgSsCat());
                pstProd.execute();
            } catch (Exception e) {
                System.out.println(e);
        }
    }    
}
