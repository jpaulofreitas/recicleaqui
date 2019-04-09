using System.Collections.Generic;

using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace Recicle.View
{
    [XamlCompilation(XamlCompilationOptions.Compile)]
    public partial class GaleriasView : ContentPage
    {
        public GaleriasView()
        {
            InitializeComponent();
            BindingContext = new ViewModel.GaleriaModelView();
        }
    }
}


//        public GaleriasView()
//        {
//            InitializeComponent();

//            var ImgPapel = new List<string>
//            {
//                "img1.jpg",
//                "papel.jpg",
//                "img_papel1.jpg",

//            };
//            ImagesCarousel.ItemsSource = ImgPapel;
//        }

//        private void ImagesCarousel_Selected(object sender, SelectedItemChangedEventArgs e)
//        {
//            var imgList = e.SelectedItem as string;

//            var imgName = new List<string> { 

//                "Ciclo do Papel",
//                "Separação do Papel",
//                "Papel Picado",

//            };
//          //  imgList = imgName;
//            ImgTitle.Text = imgName as string;
//        }
//    }
//}