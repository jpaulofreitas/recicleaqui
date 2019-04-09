using SQLite;
using System;
using System.Collections.Generic;
using System.Text;
using System.Threading.Tasks;

namespace Recicle.Model
{
    public class usuarios
    {
        [PrimaryKey]
        public int? id { get; set; }
        public string nome { get; set; }
        public string email { get; set; }
        public string password { get; set; }
        public string role { get; set; }
        //public DateTime created { get; set; }
        //public DateTime modified { get; set; }


        public async Task<int> LocalPost()
        {
            ConexaoSQLite clsConexao = new ConexaoSQLite();
            return await clsConexao.Database.InsertAsync(this);
        }
        public async Task<int> LocalPut()
        {
            ConexaoSQLite clsConexao = new ConexaoSQLite();
            return await clsConexao.Database.UpdateAsync(this);
        }
        public async Task<List<usuarios>> LocalGet()
        {
            ConexaoSQLite clsConexao = new ConexaoSQLite();
            return await clsConexao.Database.QueryAsync<usuarios>("SELECT * FROM usuarios");
        }
        public async Task LocalDelete()
        {
            ConexaoSQLite clsConexao = new ConexaoSQLite();
            await clsConexao.Database.ExecuteAsync("DELETE FROM usuarios");
        }

        public async Task<List<usuarios>> EmailSearch(string _email)
        {
            ConexaoSQLite clsConexao = new ConexaoSQLite();
            return await clsConexao.Database.QueryAsync<usuarios>("SELECT * FROM usuarios WHERE email = '" + _email + "'");
        }
    }
}
