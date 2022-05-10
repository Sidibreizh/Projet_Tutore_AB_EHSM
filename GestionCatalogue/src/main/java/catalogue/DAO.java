package catalogue;

import catalogue.Categories;
import com.mysql.jdbc.PreparedStatement;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;

public class DAO {

    Connection connection;

    public DAO(){
        String url = "jdbc:mysql://localhost:3306/croquetteatemps";

        try {
            connection = DriverManager.getConnection(url,"root","");
            System.out.println("Connecte avec succes");
        }catch(Exception e){
            System.out.println(e);
        }
    }

    List<Categories> getCategorie(){
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
}
