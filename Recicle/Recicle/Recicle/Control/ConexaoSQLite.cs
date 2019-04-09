using Xamarin.Forms;
using SQLite;
using Recicle.Model;

public class ConexaoSQLite
{
    static SQLiteAsyncConnection _database;
    public SQLiteAsyncConnection Database {
        get
        {
            if (_database == null)
            {
                _database = new SQLiteAsyncConnection(DependencyService.Get<IFileHelper>().GetLocalFilePath("usuarios.db3"));
                Database.CreateTableAsync<usuarios>().Wait();
            }
            return _database;
        }
    }
}