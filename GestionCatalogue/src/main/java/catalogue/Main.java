package catalogue;

import catalogue.Categories;

import java.util.List;

public class Main {
    public static void main(String[] args){

        DAO pdao  = new DAO();

        List<Categories> listeCat = pdao.getCategorie();
        for(Categories cat : listeCat){
            System.out.println(cat.getIdCategorie()+" "+cat.getNomCategorie());
        }
    }
}
