//using Recicle.ViewModel.Servicos;
//using Xamarin.Forms;
//using System.ComponentModel;

//namespace Recicle.ViewModel
//{
//    public class RegistroViewModel : INotifyPropertyChanged
//    {
//        string _nome, _end, _bairro, _cidade, _email, _senha, _telefone, _celular, _cnpj;
//        public event PropertyChangedEventHandler PropertyChanged;

//        public string Nome
//        {
//            get { return _nome; }
//            set { _nome = value;
//                PropertyChanged.Invoke(this, new PropertyChangedEventArgs(nameof(Nome)));
//            }
//        }

//        public string E_mail
//        {
//            get { return _email; }
//            set { _email = value;
//                PropertyChanged.Invoke(this, new PropertyChangedEventArgs(nameof(E_mail)));
//            }
//        }

//        public string Senha
//        {
//            get { return _senha; }
//            set { _senha = value;
//                PropertyChanged.Invoke(this, new PropertyChangedEventArgs(nameof(Senha))); }
//        }

//        public string End
//        {
//            get { return _end; }
//            set { _end = value;
//                PropertyChanged.Invoke(this, new PropertyChangedEventArgs(nameof(End)));
//            }
//        }    

//        public string Bairro
//        {
//            get { return _bairro; }
//            set { _bairro = value;
//                PropertyChanged.Invoke(this, new PropertyChangedEventArgs(nameof(Bairro)));
//            }
//        }
//        public string Cidade
//        {
//            get { return _cidade; }
//            set { _cidade = value;
//                PropertyChanged.Invoke(this, new PropertyChangedEventArgs(nameof(Cidade)));
//            }
//        }
//        public string Tel
//        {
//            get { return _telefone; }
//            set { _telefone = value;
//                PropertyChanged.Invoke(this, new PropertyChangedEventArgs(nameof(Tel)));
//            }
//        }
//        public string Cel
//        {
//            get { return _celular; }
//            set { _celular = value;
//                PropertyChanged.Invoke(this, new PropertyChangedEventArgs(nameof(Cel)));
//            }
//        }
//        public string Cnpj
//        {
//            get { return _cnpj; }
//            set { _cnpj = value;
//                PropertyChanged.Invoke(this, new PropertyChangedEventArgs(nameof(Cnpj)));
//            }
//        }       

//        public Command SalvarCommand { get; set; }
//        public Command LimparCommand { get; set; }
        
//        private readonly IMessageService vMessageService;
//        public RegistroViewModel()
//		{
//            this.SalvarCommand = new Command(this.Salvar);
//            this.LimparCommand = new Command(this.Limpar);

//            this.vMessageService = DependencyService.Get<Servicos.IMessageService>();
//        }

//        private void Salvar()
//        {
//            if (!E_mail.Contains("@") || !E_mail.Contains(".com") || E_mail.Contains(" "))
//            {
//                this.vMessageService.ShowAsync("email inválido!");
//            }
//        }        

//        private void Limpar()
//        {
//            Nome = "";
//            E_mail = "";
//            Senha = "";
//            End = "";
//            Bairro = "";
//            Cidade = "";
//            Tel = "" ;
//            Cel = "";
//            Cnpj = "" ;
//        }        
//	}
//}