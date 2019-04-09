using Newtonsoft.Json;
using Recicle.Control;
using Recicle.Model;
using System;
using System.Collections.Generic;
using System.Net.Http;
using System.Text;
using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace Recicle.View
{
    [XamlCompilation(XamlCompilationOptions.Compile)]
    public partial class LoginView : ContentPage
    {
        public LoginView()
        {
            InitializeComponent();
        }

        private async void btnLogin_Clicked(object sender, EventArgs e)
        {
            HttpClient clsHttp = new HttpClient();
            clsHttp.BaseAddress = new Uri("http://www.paulofreitas.net.br/recicle/api/");

            usuarios clsUsuario = new usuarios();
            clsUsuario.email = txtLogEmail.Text;
            clsUsuario.password = txtLogSenha.Text;

            string vJson = JsonConvert.SerializeObject(clsUsuario);
            StringContent clsConteudo = new StringContent(vJson, Encoding.UTF8, "application/json");
            HttpResponseMessage vResposta = await clsHttp.GetAsync("usuarios/add.json");
            string vRetornoJson = await vResposta.Content.ReadAsStringAsync();
            usuariosWSCake clsUsuariosWSCake = JsonConvert.DeserializeObject<usuariosWSCake>(vRetornoJson);
            if (clsUsuariosWSCake.success)
            {
                await DisplayAlert("Recicle Aqui!", clsUsuariosWSCake.message, "OK");
                await clsUsuario.LocalPost();
                App.Current.MainPage = new Menu();
                return;
            }
            await DisplayAlert("Erro", clsUsuariosWSCake.message, "OK");
        }

        
        ////inviamos o post, utilizando a nova classe static ConexaoWS
        ////pegamos o retorno e colocamos na variavel clsUsuarioWS
        //var clsUsuarioWS = await ConexaoWS.EnviarPost<usuariosWS>("usuario/logar", clsUsuario);

        ////o "cod" retornado do webservice me informará algumas situações
        //switch (clsUsuarioWS.cod)
        //{
        //    case 2:
        //        await DisplayAlert("Atenção!", clsUsuarioWS.msg, "OK");
        //        break;

        //    case 1:
        //        await DisplayAlert("Atenção!", clsUsuarioWS.msg, "OK");
        //        break;

        //    case 0:
        //        await clsUsuarioWS.usuario.LocalPost();
        //        App.Current.MainPage = new Menu();
        //        await DisplayAlert("Bem-vindo" + clsUsuario.nome + "!", "Login realizado com sucesso!", "OK");
        //        break;
        //}
    }
        //    try
        //    {
        //        usuarios clsUsuarios = new usuarios();

        //        List<usuarios> _ListaLogin = await clsUsuarios.EmailSearch(txtLogEmail.Text);
                
        //        if (_ListaLogin.Count > 0)
        //        {
        //            if (_ListaLogin[0].password != txtLogSenha.Text)
        //            {
        //                await DisplayAlert("Erro!", "Senha incorreta!", "OK");
        //                return;
        //            }
        //            App.Current.MainPage = new Menu();
        //            await DisplayAlert("Recicle Aqui!", "Seja bem-vindo " + _ListaLogin[0].nome + "!", "OK");
        //            return;
        //        }
        //        else
        //        {
        //            await DisplayAlert("Recicle Aqui!", "E-mail não registrado. Registre-se!", "OK");
        //        }
               
        //        clsUsuarios = null;
        //        _ListaLogin = null;
        //    }
        //    catch (Exception error)
        //    {
        //        await DisplayAlert("Erro", error.Message, "OK");
        //    }
        //}

        public void btnRegistre_Clicked(object sender, EventArgs e)
        {
            Navigation.PushAsync(new RegistroView());           
        }
    }
}