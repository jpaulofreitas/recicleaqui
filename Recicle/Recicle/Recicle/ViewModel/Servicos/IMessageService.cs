using System.Threading.Tasks;

namespace Recicle.ViewModel.Servicos
{
    public interface IMessageService
    {
        Task ShowAsync(string message);
    }
}