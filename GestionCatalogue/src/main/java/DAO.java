import java.sql.Connection;
import java.sql.DriverManager;
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
        //List<Categories>
    }
}
