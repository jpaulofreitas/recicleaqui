using System;

namespace Recicle.View
{

    public class MenuMenuItem
    {
        public MenuMenuItem()
        {
            TargetType = typeof(MainView);
        }
        public int Id { get; set; }
        public string Title { get; set; }
        public string IconMenu { get; set; }
        public Type TargetType { get; set; }
    }
}