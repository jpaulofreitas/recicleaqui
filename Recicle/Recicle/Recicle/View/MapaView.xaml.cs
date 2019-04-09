
using Xamarin.Forms;
using Xamarin.Forms.Maps;
using Xamarin.Forms.Xaml;

namespace Recicle.View
{
    [XamlCompilation(XamlCompilationOptions.Compile)]
	public partial class MapaView : ContentPage
	{
		public MapaView ()
		{
			InitializeComponent ();

            Mapa.MoveToRegion(MapSpan.FromCenterAndRadius(
                new Position(-21.166805, -50.466707),Distance.FromMeters(5000)));
            Mapa.MoveToRegion(MapSpan.FromCenterAndRadius(
                new Position(-21.147599, -50.503268), Distance.FromMeters(5000)));

            var pin1 = new Pin
            {
                Type = PinType.Place,
                Position = new Position(-21.166805, -50.466707),
                Label = "CBR Comércio de PP e PE"
            };
            var pin2 = new Pin
            {
                Type = PinType.Place,
                Position = new Position(-21.147599, -50.503268),
                Label = "WS Recicle Plásticos"
            };

            Mapa.Pins.Add(pin1);
            Mapa.Pins.Add(pin2);
		}
	}
}