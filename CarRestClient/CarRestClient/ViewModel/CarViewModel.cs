using CarRestClient.Model;
using CarRestClient.View;
using RestSharp;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.ComponentModel;
using System.Linq;
using System.Runtime.CompilerServices;
using System.Text;
using System.Text.Json;
using System.Threading.Tasks;
using System.Windows;
using DataFormat = RestSharp.DataFormat;

namespace CarRestClient.ViewModel
{
    public class CarViewModel : INotifyPropertyChanged
    {
        private String _uri = "http://localhost:5000";
        private String _api = "api/cars/";
        private Car _insertCar = new Car();
        private Car _selectedCar = new Car();
        private Car _carToUpdate = new Car();
        #region Properties
        public Car InsertCar
        {
            get => _insertCar;
            set
            {
                _insertCar = value;
                RaisePropertyChanged();
            }
        }
        public Car SelectedCar
        {
            get => _selectedCar;
            set
            {
                _selectedCar = value;
                RaisePropertyChanged();
            }
        }

        public Car CarToUpdate
        {
            get => _carToUpdate;
            set
            {
                _carToUpdate.Id = value.Id;
                _carToUpdate.Hersteller = value.Hersteller;
                _carToUpdate.KmStand = value.KmStand;
                _carToUpdate.Leistung = value.Leistung;
                _carToUpdate.Service = value.Service;
                _carToUpdate.Typenbezeichnung = value.Typenbezeichnung;
                _carToUpdate.Verkaufspreis = value.Verkaufspreis;
            }
        }
        public RestClient Client { get; }
        public ObservableCollection<Car> Cars { get; set; }
        #endregion
        public CarViewModel()
        {
            try
            {
                Client = new RestClient(_uri);
                Cars = new ObservableCollection<Car>();

                GetCars();
            }
            catch (Exception e)
            {
                MessageBox.Show("konnte keine Verbindung Aufbauen", "keine Verbindung", MessageBoxButton.OK);

            }

            
            
            DeleteCarCommand = new RelayCommand(e =>
            {
                var result = MessageBox.Show("Delete?", "Delete", MessageBoxButton.YesNo);

                if(result == MessageBoxResult.No)
                    return;

                DeleteCar(SelectedCar.Id);
                GetCars();
            }, c => (Cars.Contains(SelectedCar)));
            ShowAddWindowCommand = new RelayCommand(e =>
            {
                AddView view = new AddView();
                view.DataContext = this;
                view.Show();
            });
            PostCarCommand = new RelayCommand(e =>
            {
                PostCar(new Car
                {
                    Hersteller = InsertCar.Hersteller,
                    Typenbezeichnung = InsertCar.Typenbezeichnung,
                    KmStand = InsertCar.KmStand,
                    Leistung = InsertCar.Leistung,
                    Service = InsertCar.Service,
                    Verkaufspreis = InsertCar.Verkaufspreis
                });
                CloseView();
                GetCars();
            });
            ShowUpdateWindowCommand = new RelayCommand(e =>
            {
                CarToUpdate = SelectedCar;
                UpdateView view = new UpdateView();
                view.DataContext = this;
                view.Show();
            });
            CloseWindowCommand = new RelayCommand(e =>
            {
                CloseView();
            });
            UpdateCarCommand = new RelayCommand(e =>
            {
                UpdateCar(CarToUpdate);
                CloseView();
                GetCars();
            });
        }


        #region Commands
        public RelayCommand DeleteCarCommand { get; }
        public RelayCommand ShowAddWindowCommand { get;}
        public RelayCommand PostCarCommand { get; }
        public RelayCommand UpdateCarCommand { get; }
        public RelayCommand ShowUpdateWindowCommand { get; }
        public RelayCommand CloseWindowCommand { get; }

        #endregion
        #region Methods

        public void CloseView()
        {
            var view = Application.Current.Windows.OfType<Window>().SingleOrDefault(x => x.IsActive);
            if (view != null) view.Close();
        }

        public async void GetCars()
        {
            this.Cars.Clear();
            
            var request = new RestRequest(_api, Method.Get);
            var response = await Client.ExecuteAsync<List<Car>>(request);

            if (response.IsSuccessful)
            {
                response.Data.ForEach(car => this.Cars.Add(car));
            }

        }

        public async void PostCar(Car car)
        {
            var request = new RestRequest(_api, Method.Post);
            request.RequestFormat = DataFormat.Json;
            request.AddBody(car);
            await Client.ExecuteAsync(request);
        }

        public async void UpdateCar(Car car)
        {
            var request = new RestRequest($"{_api}{car.Id}", Method.Put);
            request.RequestFormat = DataFormat.Json;
            request.AddBody(car);
            await Client.ExecuteAsync(request);
        }

        public async void DeleteCar(int id)
        {
            var request = new RestRequest($"{_api}{id}", Method.Delete);
            await Client.ExecuteAsync(request);
        }
        #endregion

        #region PropertyChanged
        public event PropertyChangedEventHandler PropertyChanged;
        protected void RaisePropertyChanged([CallerMemberName] string name = null)
        {
            PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(name));
        }
        #endregion
    }
}
