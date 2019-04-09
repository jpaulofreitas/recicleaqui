using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Text;

namespace Recicle.ViewModel
{
    public class Galeria
    {
        public string ImageUrl { get; set; }
        public string Name { get; set; }
    }
    public class GaleriaModelView
    {
        public ObservableCollection<Galeria> Galerias { get; set; }

        public GaleriaModelView()
        {
            try
            {
                Galerias = new ObservableCollection<Galeria>
                {
                    new Galeria
                    {
                        ImageUrl = "img1.jpg",
                        Name = "Ciclo do Papel"
                    },
                    new Galeria
                    {
                        ImageUrl = "papel.jpg",
                        Name = "Separação do papel"
                    },
                    new Galeria
                    {
                        ImageUrl = "img_papel1.jpg",
                        Name = "Papel picado para preparação"
                    },
                    new Galeria
                    {
                        ImageUrl = "img_papel2.jpg",
                        Name ="Caixas de Papelão"
                    },
                    new Galeria
                    {
                        ImageUrl = "img_papel3.jpg",
                        Name = "Jornais Velhos"
                    },
                    new Galeria
                    {
                        ImageUrl = "plastico.jpg",
                        Name =  "Plásticos"
                    },
                    new Galeria
                    {
                        ImageUrl =  "plastico_classificacao.jpg",
                        Name = "Classificação dos Plásticos"
                    },
                    new Galeria
                    {
                        ImageUrl = "ferro_velho.jpg",
                        Name = "Ferro Velho"
                    },
                    new Galeria
                    {
                        ImageUrl =  "sucata_absolente.jpg",
                        Name = "Sucatas"
                    },
                    new Galeria
                    {
                        ImageUrl = "sucata_metal.jpg",
                        Name ="Preparo da Sucata"
                    },
                    new Galeria
                    {
                        ImageUrl = "vidro.jpg",
                        Name =  "Vidros"
                    },
                    new Galeria
                    {
                        ImageUrl =  "icon_eletronico.jpg",
                        Name = "Lixo Eletrônico"
                    },
                    new Galeria
                    {
                        ImageUrl = "icon_embalagem.jpg",
                        Name ="Embalagens Tetrapak"
                    },
                    new Galeria
                    {
                        ImageUrl = "icon_lampada.jpg",
                        Name ="Lampadas Fluorescente"
                    },
                    new Galeria
                    {
                        ImageUrl = "icon_pneu.jpg",
                        Name ="Pneus Velhos"
                    },
                    new Galeria
                    {
                        ImageUrl = "isopor.jpg",
                        Name ="Isopor"
                    },
                    new Galeria
                    {
                        ImageUrl = "resto_alimentos.jpg",
                        Name ="Resto de Alimentos"
                    },
                    new Galeria
                    {
                        ImageUrl = "resto_oleo.jpg",
                        Name =  "Resto de Óleo"
                    },
                    new Galeria
                    {
                        ImageUrl = "restococo.jpg",
                        Name = "Descarte de Coco"
                    },
                    new Galeria
                    {
                        ImageUrl =  "reut_agua.jpg",
                        Name = "Reutilização da Água"
                    }
                };
            }
            catch (Exception error)
            {
                App.Current.MainPage.DisplayAlert("Erro", error.Message, "OK");
            }
        }
    }
}