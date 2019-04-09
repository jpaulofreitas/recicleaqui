using System;
using System.ComponentModel;
using System.Threading.Tasks;

namespace Recicle.ViewModel
{
    public abstract class ViewModelBase : INotifyPropertyChanged
    {

        public event PropertyChangedEventHandler PropertyChanged;


        protected void Notify(string propertyName)//utilizado quando uma propriedade for alterada
        {
            if (this.PropertyChanged != null)
                this.PropertyChanged(this, new PropertyChangedEventArgs(propertyName));
        }       
    }
}
