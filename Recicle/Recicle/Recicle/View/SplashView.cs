//using Xamarin.Forms;

//namespace Recicle.View
//{
//    public class SplashView : ContentPage
//    {
//        Image splashImage;

//        public SplashView()
//        {
//            NavigationPage.SetHasNavigationBar(this, false);

//            var sub = new AbsoluteLayout();
//            splashImage = new Image
//            {
//                Source = "recycling.png",
//                WidthRequest = 150,
//                HeightRequest = 150
//            };
//            AbsoluteLayout.SetLayoutFlags(splashImage,
//               AbsoluteLayoutFlags.PositionProportional);
//            AbsoluteLayout.SetLayoutBounds(splashImage,
//             new Rectangle(0.5, 0.5, AbsoluteLayout.AutoSize, AbsoluteLayout.AutoSize));

//            sub.Children.Add(splashImage);

//            this.BackgroundColor = Color.Transparent ;
//            this.Content = sub;
//        }
//        protected override async void OnAppearing()
//        {
//            base.OnAppearing();

//            await splashImage.ScaleTo(1.1, 1500); //Time-consuming processes such as initialization
//            await splashImage.ScaleTo(0.7, 1500, Easing.Linear);
//            await splashImage.ScaleTo(150, 2000, Easing.Linear);
//            Application.Current.MainPage = new Menu();    //After loading  MainPage it gets Navigated to our new Page
//        }
//    }
//}

