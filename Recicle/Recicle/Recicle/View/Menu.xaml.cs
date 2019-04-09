using Recicle.Model;
using System;
using System.Collections.Generic;
using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace Recicle.View
{
    [XamlCompilation(XamlCompilationOptions.Compile)]
    public partial class Menu : MasterDetailPage
    {
        public Menu()
        {
            InitializeComponent();
            MasterPage.ListView.ItemSelected += ListView_ItemSelected;
        }
        protected async override void OnAppearing()
        {
            base.OnAppearing();
            usuarios clsUsuario = new usuarios();
            List<usuarios> _Lista = await clsUsuario.LocalGet();

            if (_Lista.Count > 0)
            {
                await DisplayAlert("Recicle Aqui!", "Seja bem-vindo " + _Lista[_Lista.Count - 1].nome + "!", "OK");
            }
            clsUsuario = null;
            _Lista = null;
        }

        private void ListView_ItemSelected(object sender, SelectedItemChangedEventArgs e)
        {
            try
            {            
                var item = e.SelectedItem as MenuMenuItem;
                if (item == null)
                    return;

                var page = (Page)Activator.CreateInstance(item.TargetType);
                page.Title = item.Title;

                Detail =  new NavigationPage(page);
                IsPresented = false;

                MasterPage.ListView.SelectedItem = null;
            }
            catch (Exception error)
            {

                DisplayAlert("Erro", error.Message, "OK");
            }
        }
    }
}