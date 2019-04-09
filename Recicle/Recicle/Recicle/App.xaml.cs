using Xamarin.Forms;

namespace Recicle
{
    public partial class App : Application
	{
        public App ()
		{
			InitializeComponent();
                        
            App.Current.MainPage = new View.Menu();            
        }        

        protected override void OnStart ()
		{
			// Handle when your app starts
		}

		protected override void OnSleep ()
		{
			// Handle when your app sleeps
		}

		protected override void OnResume ()
		{
			// Handle when your app resumes
		}
	}
}
