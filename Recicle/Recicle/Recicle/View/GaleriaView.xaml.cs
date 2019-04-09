
using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace Recicle.View
{
    public partial class GaleriaView : TabbedPage
    {
        public GaleriaView ()
        {
            InitializeComponent();
            
            Children.Add(new GaleriasView());            
        }
    }
}