using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace Recicle.View
{
	[XamlCompilation(XamlCompilationOptions.Compile)]
	public partial class PedidoView : ContentPage
	{
		public PedidoView ()
		{
			InitializeComponent ();
		}

        public void lvwPedidos_ItemTapped(object sender, EventArgs e)
        {

        }
	}
}