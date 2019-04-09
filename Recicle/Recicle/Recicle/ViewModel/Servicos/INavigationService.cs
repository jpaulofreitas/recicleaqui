using System.Threading.Tasks;

namespace Recicle.ViewModel.Servicos
{
    public interface INavigationService
    {
        Task NavigateToLogin();
        Task NavigateToRegister();
        Task NavigateToMain();
        Task NavigateToApresentacao();
        Task NavigateToGalerias();
        Task NavigateToMapa();
        Task NavigateToMetal();
        Task NavigateToOrganicos();
        Task NavigateToOutros();
        Task NavigateToPapel();
        Task NavigateToPlastico();
        Task NavigateToVidro();
    }
}
