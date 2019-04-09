using Newtonsoft.Json;
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
    public partial class RegistroView : ContentPage
    {
        public RegistroView()
        {
            InitializeComponent();
        }

        protected async override void OnAppearing()
        {
            base.OnAppearing();
            usuarios clsUsuarios = new usuarios();

            List<usuarios> _ListaUsuarios = await clsUsuarios.LocalGet();

            clsUsuarios = null;

            pckPessoa.SelectedIndex = 0;
        }
        private async void btnSalvar_Clicked(object sender, EventArgs e)
        {
            try
            {
                HttpClient clsHttp = new HttpClient();
                clsHttp.BaseAddress = new Uri("http://www.paulofreitas.net.br/recicle/api/");

                usuarios clsUsuario = new usuarios();

                clsUsuario.nome = txtNome.Text;
                clsUsuario.email = txtEmail.Text;
                clsUsuario.password = txtSenha.Text;
                clsUsuario.role = "cliente";

                string vJson = JsonConvert.SerializeObject(clsUsuario);
                StringContent clsConteudo = new StringContent(vJson, Encoding.UTF8, "application/json");
                HttpResponseMessage vResposta = await clsHttp.PostAsync("usuarios/add.json", clsConteudo);
                string vRetornoJson = await vResposta.Content.ReadAsStringAsync();
                usuariosWSCake clsUsuariosWSCake = JsonConvert.DeserializeObject<usuariosWSCake>(vRetornoJson);
                if (clsUsuariosWSCake.success)
                {
                    await DisplayAlert("Recicle Aqui!", clsUsuariosWSCake.message, "OK");
                    await clsUsuario.LocalPost();
                    App.Current.MainPage = new Menu();
                    return;
                }                
                await DisplayAlert("Erro", clsUsuariosWSCake.message ,"OK");
            }
            catch (Exception error)
            {
                await DisplayAlert("Erro", error.Message, "OK");
            }

            //try
            //{
            //    usuarios clsUsuarios = new usuarios();
            //    clsUsuarios.id = null;
            //    clsUsuarios.nome = txtNome.Text;
            //    clsUsuarios.email = txtEmail.Text;
            //    clsUsuarios.password = txtSenha.Text;
            //    clsUsuarios.role = "cliente";
            //    //clsRegistro.cnpj = txtCnpj.Text;
            //    //clsRegistro.end = txtEnd.Text;
            //    //clsRegistro.bairro = txtBairro.Text;
            //    //clsRegistro.cidade = txtCidade.Text;
            //    //clsRegistro.telefone = txtTel.Text;
            //    //clsRegistro.celular = txtCel.Text;

            //    List<usuarios> _ListaUsuarios = await clsUsuarios.LocalGet();

            //    if (_ListaUsuarios.Count > 0)
            //    {
            //        if (txtEmail.Text == "" || txtSenha.Text == "")
            //        {
            //            await DisplayAlert("Erro!", "Favor, inserir e-mail/senha!", "OK");
            //            return;
            //        }
            //        List<usuarios> _ListaEmail = await clsUsuarios.EmailSearch(clsUsuarios.email);

            //        if (_ListaEmail.Count > 0)
            //        {
            //            await DisplayAlert("Erro!", "Este e-mail já foi cadastrado!", "OK");
            //            return;
            //        }
            //        await clsUsuarios.LocalPost();
            //        await DisplayAlert("Recicle Aqui!", "Cadastro realizado com sucesso!", "OK");
            //        await Navigation.PushAsync(new LoginView());
            //    }
                

            //    clsUsuarios = null;

            //    lblId.Text = "0";
            //    txtNome.Text = null;
            //    txtEmail.Text = null;
            //    txtSenha.Text = null;
            //    txtCnpj.Text = null;
            //    txtEnd.Text = null;
            //    txtBairro.Text = null;
            //    txtCidade.Text = null;
            //    txtCel.Text = null;
            //    txtTel.Text = null;
            //}
            //catch (Exception error)
            //{

            //    await DisplayAlert("Erro!", error.Message, "OK");
            //}
        }
        private void pckPessoa_Selected(object sender, EventArgs e)
        {
            int vPessoa = pckPessoa.SelectedIndex;
            

            if (vPessoa == 1)
            {
                lblNome.Text = "Razão Social";
                lblCnpj.IsVisible = true;
                txtCnpj.IsVisible = true;
                lblEnd.IsVisible = true;
                txtEnd.IsVisible = true;
                lblBairro.IsVisible = true;
                txtBairro.IsVisible = true;
                lblCidade.IsVisible = true;
                txtCidade.IsVisible = true;
                lblTel.IsVisible = true;
                txtTel.IsVisible = true;
                lblCel.IsVisible = true;
                txtCel.IsVisible = true;
            }

            if (vPessoa == 0)
            {
                lblNome.Text = "Nome:";
                lblCnpj.IsVisible = false;
                txtCnpj.IsVisible = false;
                lblEnd.IsVisible = false;
                txtEnd.IsVisible = false;
                lblBairro.IsVisible = false;
                txtBairro.IsVisible = false;
                lblCidade.IsVisible = false;
                txtCidade.IsVisible = false;
                lblTel.IsVisible = false;
                txtTel.IsVisible = false;
                lblCel.IsVisible = false;
                txtCel.IsVisible = false;
            }
        }
    }
}