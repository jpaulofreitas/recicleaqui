using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;

namespace Recicle.Control
{
    public static class ConexaoWS
    {
        public async static Task<T> EnviarPost<T>(string nomeMetodo, object objetoEnviar)
        {//classe STATIC são enviadas automaticamente à memória quando o app é aberto e nao necessita de ser instanciada (invocada)
         // o T significa Type(tipo) quer dizer que posso receber qq tipo de variavel de retorno, pode ser string, int, var

            //instanciando a classe de acesso ao banco de dados web HTTP
            HttpClient vHttp = new HttpClient();

            //definição da url base do endereço do webservice
            vHttp.BaseAddress = new Uri("http://www.paulofreitas.net.br/api/");

            //conversão do metodo do objeto a ser enviado em Json que é uma string
            string vJson = JsonConvert.SerializeObject(objetoEnviar);

            //encapsulamos o vJson em ma variavel para ser enviada
            StringContent clsConteudo = new StringContent(vJson);

            //invocamos um post, enviando o conteudo encapsulado , depois pegamos a resposta
            HttpResponseMessage vResposta = await vHttp.PostAsync(nomeMetodo, clsConteudo);

            //capturamos o Json retornado pelo webservice
            string vRetornoJson = await vResposta.Content.ReadAsStringAsync();

            //deserializamos o Json retornado para o formato (classe)
            return JsonConvert.DeserializeObject<T>(vRetornoJson);
        }
    }
}