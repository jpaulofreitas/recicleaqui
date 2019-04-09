using Newtonsoft.Json;
using Recicle.Model;
using System;
using System.Net.Http;
using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace Recicle.View
{
    [XamlCompilation(XamlCompilationOptions.Compile)]
	public partial class MainView : ContentPage
	{
        public MainView()
		{
			InitializeComponent ();
        }

        private async void btnLogoutClicked(object sender, EventArgs e)
        {
            bool vLogout = await DisplayAlert("Logout", "Deseja realmente sair?", "Sim", "Não");
            if (vLogout)
            {
                usuarios clsUsuario = new usuarios();
                await clsUsuario.LocalDelete();
                clsUsuario = null;
                App.Current.MainPage = new Menu();
            }
        }

        private async void btnDeleteClicked(object sender, EventArgs e)
        {
            try
            {

                bool vDeletar = await DisplayAlert("Deletar Conta", "Deseja realmente deletar sua conta?", "Sim", "Não");
                if (vDeletar)
                {
                    usuarios clsUsuario = new usuarios();
                    await clsUsuario.LocalDelete();
                    clsUsuario = null;
                    
                    //aciono o webservice para deletar a conta no servidor

                    HttpClient clsHttpClient = new HttpClient();
                    clsHttpClient.BaseAddress = new Uri("http://www.paulofreitas.net.br/api/");
                    string vJson = JsonConvert.SerializeObject(clsUsuario);
                    StringContent clsContent = new StringContent(vJson);
                    HttpResponseMessage vResposta = await clsHttpClient.PostAsync("usuarios/delete", clsContent);
                    string vRetornoText = await vResposta.Content.ReadAsStringAsync(); //esse retorno é apenas a mensagem de "usuario deletado"
                    await DisplayAlert("Usuário Deletado!", vRetornoText, "OK");
                    //fim webservice 
                    //volto pra pagina inicial
                    App.Current.MainPage = new Menu();
                }
            }
            catch (Exception ex)
            {
                await DisplayAlert("Erro!", ex.Message, "OK");
            }
        }
        private void OnPapelTapped(object sender, EventArgs args)
        {
                Navigation.PushAsync(new RecPapelView());
        }
        private void OnPlasticoTapped(object sender, EventArgs args)
        {
            Navigation.PushAsync(new RecPlasticoView());         
        }
        private void OnVidroTapped(object sender, EventArgs args)
        {
            Navigation.PushAsync(new RecVidroView());            
        }
        private void OnMetalTapped(object sender, EventArgs args)
        {
            Navigation.PushAsync(new RecMetalView());            
        }
        private void OnOrganicosTapped(object sender, EventArgs args)
        {
            Navigation.PushAsync(new RecOrganicosView());            
        }
        private void OnOutrosTapped(object sender, EventArgs args)
        {
            Navigation.PushAsync(new RecOutrosView());            
        }
        private void OnMapaTapped(object sender, EventArgs args)
        {
            Navigation.PushAsync(new MapaView());            
        }
        private void OnGaleriaTapped(object sender, EventArgs args)
        {
            Navigation.PushAsync(new GaleriasView());         
        }
    }
}