using Recicle.Model;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.ComponentModel;
using System.Runtime.CompilerServices;

using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace Recicle.View
{
    [XamlCompilation(XamlCompilationOptions.Compile)]
    public partial class MenuMaster : ContentPage
    {
        public ListView ListView;
        public ObservableCollection<MenuMenuItem> MenuItems { get; set; }

        public MenuMaster()
        {
            InitializeComponent();
            MenuItems = new ObservableCollection<MenuMenuItem>(new[]
                {
                    new MenuMenuItem { Id = 0, Title = "Início", IconMenu= "recycling.png", TargetType = typeof(MainView), },
                    new MenuMenuItem { Id = 1, Title = "Mapa", IconMenu="icon_mapa.png", TargetType = typeof(MapaView) },
                    new MenuMenuItem { Id = 2, Title = "Fotos", IconMenu="icon_galeria.png", TargetType = typeof(GaleriasView) },
                    new MenuMenuItem { Id = 3, Title = "Metal", IconMenu="icon_metal.png",  TargetType = typeof(RecMetalView) },
                    new MenuMenuItem { Id = 4, Title = "Papel", IconMenu="icon_papel.png",  TargetType = typeof(RecPapelView) },
                    new MenuMenuItem { Id = 5, Title = "Plastico", IconMenu="icon_plastico.png",  TargetType = typeof(RecPlasticoView) },
                    new MenuMenuItem { Id = 6, Title = "Vidro", IconMenu="icon_vidro.png",  TargetType = typeof(RecVidroView) },
                    new MenuMenuItem { Id = 7, Title = "Orgânicos", IconMenu="icon_organicos.png",  TargetType = typeof(RecOrganicosView) },
                    new MenuMenuItem { Id = 8, Title = "Outros", IconMenu="icon_outros.png",  TargetType = typeof(RecOutrosView) },

                });
            MenuItemsListView.ItemsSource = MenuItems;
            ListView = MenuItemsListView;
        }

        protected async  override void OnAppearing()
        {
            base.OnAppearing();
            usuarios clsUsuario = new usuarios();
            List<usuarios> _Lista = await clsUsuario.LocalGet();

            if (_Lista.Count == 0)
            {
                MenuItems.Add(new MenuMenuItem { Id = 9, Title = "Registre-se", TargetType = typeof(RegistroView) });
                MenuItems.Add(new MenuMenuItem { Id = 10, Title = "Login", TargetType = typeof(LoginView) });
            }
            else
            {
                MenuItems.Add(new MenuMenuItem { Id = 11, Title = "Solicite Coleta", TargetType = typeof(PedidoView) });
              // MenuItems.Add(new MenuMenuItem { Id = 12, Title = "Logout", TargetType = Button });



                //private async void btnLogout_Clicked(object sender, EventArgs e)
                //{
                //    bool vResposta = await DisplayAlert("Logout", "Deseja realmente sair?", "Sim", "Não");
                //    if (vResposta)
                //    {
                //        //Model.usuario clsUsuario = new Model.usuario(); //ja estou utilizando globalmente a variavel e nao preciso cria-la localmente
                //        await clsUsuario.ExcluirLocal();
                //        //clsUsuario = null;
                //        App.Current.MainPage = new View.PageLogar();
                //    }
                //}
            }
            clsUsuario = null;
            _Lista = null;
        }
    }
}