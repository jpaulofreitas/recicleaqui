using System;
using System.Collections.Generic;
using System.Text;

namespace Recicle.Model
{
    class usuariosWS
    {
        public int cod { get; set; }
        public string msg { get; set; }
        public usuarios usuario { get; set; }

    }

    class usuariosWSCake
    {
        public bool success { get; set; }
        public string message { get; set; }

    }
}
