/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.gestioncatalogue;

/**
 *
 * @author Sidi Breizh
 */

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.List;

public class DAO {
  /*  Connection connection;
    public DAO(){
    String url = "jdbc:mysql://localhost:3306/croquetteatemps";
        
        try {
            connection = DriverManager.getConnection(url, "root", "");
        } catch (SQLException e) {
            System.out.println(e);
        }  
}  

    /*List<Categories> getCategorie(){
        List<Categories> listeCat = new ArrayList<Categories>();
        String sqlCat = "select * from categorie_produit";
        try {
            PreparedStatement pstCat = (PreparedStatement) connection.prepareStatement(sqlCat); //Preparedstatement empeche injection sql
            ResultSet resCat = pstCat.executeQuery();
            while(resCat.next()){
                Categories cat = new Categories(resCat.getInt("idCategorie"),resCat.getString("nomCategorie"));
                listeCat.add(cat);
            }
        }catch(Exception e){
            System.out.println(e);
        }
        return listeCat;
    }
    
    
    List<Produits> getProduits() {
        List<Produits> listeProd = new ArrayList<Produits>();
        String sqlProd = "select * from produit";
        try {
            PreparedStatement pstProd = (PreparedStatement) connection.prepareStatement(sqlProd); //Preparedstatement empeche injection sql
            ResultSet resProd = pstProd.executeQuery();
            while (resProd.next()) {
                Produits prod = new Produits(resProd.getInt("idProduit"), resProd.getInt("idCategorie"), resProd.getInt("idSsCategorie"), resProd.getInt("idMarque"),
                        resProd.getInt("idFournisseur"), resProd.getInt("idSolde"), resProd.getString("nom"), resProd.getFloat("prix"), resProd.getString("description"), resProd.getString("photo"));
                listeProd.add(prod);
            }
        } catch (Exception e) {
            System.out.println(e);
        }
        return listeProd;
    }*/

    /*public void creeProduit(Produits pr){
        String sqlPro = "insert into produit(idCategorie,idSsCategorie,idMarque,idFournisseur,idSolde,nom,prix,description,photo) values (?,?,?,?,?,?,?,?,?)";
        try {
                PreparedStatement pstProd = (PreparedStatement) connection.prepareStatement(sqlPro);
                pstProd.setInt(1, pr.getIdCategorie());
                pstProd.setInt(2, pr.getIdSsCategorie());
                pstProd.setInt(3, pr.getIdMarque());
                pstProd.setInt(4, pr.getIdFournisseur());
                pstProd.setInt(5, pr.getIdSolde());
                pstProd.setString(6, pr.getNom());
                pstProd.setFloat(7, pr.getPrix());
                pstProd.setString(8, pr.getDescription());
                pstProd.setString(9, pr.getPhoto());
                pstProd.execute();
            } catch (Exception e) {
                System.out.println(e);
        }
    }

    /*public Produits getProduitById(int idProduit) { // recuperation des donnees sql vers java
        String sql = "select * from produit where idProduit=?";

        try{
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
            pst.setInt(1, idProduit);
            ResultSet res = pst.executeQuery();
            if(res.next()) {
                Produits p = new Produits(res.getInt("idProduit"), res.getInt("idCategorie"), res.getInt("idSsCategorie"),res.getInt("idMarque"),
                        res.getInt("idFournisseur"),res.getInt("idSolde"),res.getString("nom"),res.getFloat("prix"),res.getString("description"),res.getString("description"));
                return p;
            }
        } catch (SQLException e) {
            System.out.println(e);
        }
        return null;
    }

    public void updateProduit(Produits pr) { //MAJ test des produits en SQL
        String sql = "update produit set designation=?, prix=? where idProduit=?";

        try{
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
            pst.setString(1, pr.getDesignation());
            pst.setDouble(2, pr.getPrix());
            pst.setInt(3, pr.getIdProduit());

            pst.execute();

        } catch (SQLException e) { System.out.println(e); }
    }*/

   /* public void supprProduit(int idProduit) { //suppression des donnees sur sql
        String sqlSuppr = "delete from produit where idProduit=?";

        try{
            PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sqlSuppr);
            pst.setInt(1, idProduit);
            pst.execute();
        } catch (SQLException e){
            System.out.println(e);
        }
    }*/
}