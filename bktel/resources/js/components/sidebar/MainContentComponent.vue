<template>
  <div class="flex flex-wrap ml-[3.2rem] md:ml-72 mt-[50px] md:mt-[70px]">
    <div class="flex flex-col items-center md:flex-row justify-left  w-full md:justify-around mt-[10px] font-bold  ">
      <div>
        <BarChart :chart-data="show.humDataRender" :height=300 :css-classes="cssClassesBar" />
        <div class="flex flex-row justify-center mt-[10px] font-bold"> DHT11</div>
      </div>
      <div>
        <LineChart class="md:ml-[30px]" :chart-data="show.temptDataLineRender" :width=500 :height=300
          :css-classes="cssClassesLine" :chart-options="chartOptions1" />
        <div class="flex flex-row justify-center mt-[10px] font-bold"> LM35</div>
      </div>
    </div>
    <div class="w-full flex flex-wrap ">
      <div class="flex flex-col md:flex-row justify-left  w-full md:justify-around mt-[20px] mb-[20px] items-center">
        <div>
          <LineChart :chart-data="show.moistureDataRender" :height="300" :css-classes="cssClassesLine"
            :chart-options="chartOptions2" />
          <div class="flex flex-row justify-center mt-[10px] font-bold"> Soil Moisture</div>
        </div>
        <!-- {{state.moistureDataFirebase.datasets[0].data}} -->
        <div class="flex flex-col w-[350px] md:w-[500px] md:ml-[30px]">
          <div class=" inline-block min-w-full">
            <table class="min-w-full bg-green-50 mb-[10px]">
              <thead class="border-b bg-gray-200">
                <tr>
                  <th scope="col" class="text-[18px] font-medium text-gray-900 px-6 py-[10px] text-left">
                    #
                  </th>
                  <th scope="col" class="text-[18px] font-medium text-gray-900 px-6 py-[10px] text-left">
                    Name
                  </th>
                  <th scope="col" class="text-[18px] font-medium text-gray-900 px-6 py-[10px] text-left">
                    Value
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr class="border-b">
                  <td class="px-6 py-[15px] whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                    LM35
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                    {{ state.tempDataLineFirebase.datasets[0].data }} (°C)
                  </td>
                </tr>
                <tr class="border-b">
                  <td class="px-6 py-[15px] whitespace-nowrap text-sm font-medium text-gray-900">2</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                    DHT11
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                    {{ state.humDataFirebase.datasets[1].data }} (%)
                  </td>
                </tr>
                <tr class="border-b">
                  <td class="px-6 py-[15px] whitespace-nowrap text-sm font-medium text-gray-900">3</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                    Soil Moisture
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                    {{ state.moistureDataFirebase.datasets[0].data }} (%)
                  </td>
                </tr>
                <tr class="border-b">
                  <td class="px-6 py-[15px] whitespace-nowrap text-sm font-medium text-gray-900">4</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                    Light Sensor
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                    Daytime
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <button type="button"
            class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 
            focus:outline-none focus:ring-green-400 dark:focus:ring-green-800 shadow-lg font-medium rounded-lg text-sm py-2.5 text-center mb-2"
            @click="checkWaterPump(state.tempDataLineFirebase.datasets[0].data, state.moistureDataFirebase.datasets[0].data)">
            Would you like to see suggestions for water pumping?
            <span class="text-blue-800 font-semibold text-[16px]"> Click here </span>
          </button>
          <div id="popup-modal" tabindex="-1" v-if="showPopup"
            class="fixed top-[30%] left-[35%] right-0 z-50 p-4 overflow-x-hidden overflow-y-auto max-h-full">
            <div class="relative w-full max-w-md max-h-full">
              <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 ">
                <button type="button" @click="showPopup = false"
                  class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                  data-modal-hide="popup-modal">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
                  </svg>
                  <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                  <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                  <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{ popupMessage }}</h3>
                  <button data-modal-hide="popup-modal" type="button" @click="showPopup = false"
                    class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Turn the pump on
                  </button>
                  <button data-modal-hide="popup-modal" type="button" @click="showPopup = false"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                    cancel</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LineChart from './Chart/Line.vue'
import BarChart from './Chart/Bar.vue'
import DoughnutChart from './Chart/Donut.vue'
import { onMounted, reactive } from 'vue'
import { chartDataLineCollection, DHT11Collection, LM35Collection, moistureCollection } from '../../../utl/firebase'
import firebase from '../../../utl/firebase'
export default {
  props: {
    saveInputDataUrl: {
      type: String,
      default() {
        return "";
      }
    },
    inputDevice: {
      type: Array,
      default() {
        return [];
      }
    },
    checkWaterPumpUrl: {
      type: String,
      default() {
        return "";
      }
    }
  },
  setup() {
    const state = reactive({
      chartDataLineFirebase: {},
      tempDataLineFirebase: {
        time: "",
        datasets: [
          {
            data: []
          },
        ],
      },
      moistureDataFirebase: {
        time: "",
        datasets: [
          {
            data: []
          }
        ],
      },
      moistureDataCollection: [],
      tempDataCollection: [],
      tempDHT11DataCollection: [],
      HumDataCollection: [],
      humDataFirebase: {
        time: "",
        datasets: [
          {
            data: []
          },
          {
            data: []
          }
        ],
      }
    });
    var show = reactive({
      temptDataLineRender: {
        datasets: [
          {
            backgroundColor: ['#41B883'],
            data: [],
            label: 'Temp'
          },
          {
            backgroundColor: ['#dc3545'],
            data: [],
            label: 'Threshold',
          }
        ],
        labels: [],
      },
      humDataRender: {
        datasets: [
          {
            backgroundColor: ['#dc3545'],
            data: [],
            label: 'Temp (°C)'
          },
          {
            backgroundColor: ['#41B883'],
            data: [],
            label: 'Humidity (%)',
          }
        ],
        labels: [],
      },
      moistureDataRender: {
        datasets: [
          {
            backgroundColor: ['#00D8FF'],
            data: [],
            label: 'Moisture'
          },
        ],
        labels: [],
      },
    });
    onMounted(async () => {
      let chartDataLineSet = chartDataLineCollection.on("value", snapshot => {
        state.chartDataLineFirebase = snapshot.val();
        console.log('update success')
      });
      let temptData = LM35Collection.on("value", snapshot => {
        state.tempDataLineFirebase = snapshot.val();
        state.tempDataLineFirebase.time = new Date();
        state.tempDataCollection.push(state.tempDataLineFirebase.datasets[0].data)
        var d = new Date();
        show.temptDataLineRender.labels.push(d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds());
        var lengthLabels = show.temptDataLineRender.labels.length;
        show.temptDataLineRender.datasets[1].data.push(38);
        console.log(lengthLabels);
        if (lengthLabels > 4) {
          // state.tempDataCollection.shift();
          // show.temptDataLineRender.datasets[0].data.shift();
          // show.temptDataLineRender.datasets[1].data.shift();
        }
        let obj = {
          name: 'LM35',
          device_id: '1',
          value: state.tempDataLineFirebase.datasets[0].data,
          timestamp: d.toLocaleString(),
        }
        firebase.firestore.collection('dataLM35').add(obj)
          .then(doc => {
            obj.value = "";
            obj.timestamp = "";
          }).catch(e => {
            console.log(e);
          })
      });
      let humidityData = DHT11Collection.on("value", snapshot => {
        state.humDataFirebase = snapshot.val();
        state.tempDHT11DataCollection.push(state.humDataFirebase.datasets[0].data);
        state.HumDataCollection.push(state.humDataFirebase.datasets[1].data);
        var time = new Date();
        show.humDataRender.labels.push(time.getHours() + ':' + time.getMinutes() + ':' + time.getSeconds());
        // console.log(state.humDataFirebase.datasets[0].data);
      });
      let moistureData = moistureCollection.on("value", snapshot => {
        state.moistureDataFirebase = snapshot.val();
        state.moistureDataFirebase.datasets[0].data = Math.round((4096 - state.moistureDataFirebase.datasets[0].data) * 100 / 4096);
        state.moistureDataCollection.push(state.moistureDataFirebase.datasets[0].data);
        var time = new Date();   //check bien time
        show.moistureDataRender.labels.push(time.getHours() + ':' + time.getMinutes() + ':' + time.getSeconds());
      })

      // state.chartDataLineFirebase = chartDataLineSet.val();

      show.temptDataLineRender.datasets[0].data = state.tempDataCollection;
      show.humDataRender.datasets[0].data = state.tempDHT11DataCollection;
      show.humDataRender.datasets[1].data = state.HumDataCollection;
      show.moistureDataRender.datasets[0].data = state.moistureDataCollection;
    })
    return { state, show };
  },
  components: {
    BarChart,
    LineChart,
    DoughnutChart
  },

  data() {
    return {
      popupMessage: '',
      showPopup: false,
      cssClassesBar: 'bg-[#faebd7] rounded-[10px] w-[350px] sm:w-[500px]',
      cssClassesLine: 'bg-[#faebd7] rounded-[10px]  w-[350px] sm:w-[500px]',
      cssClassesDonut: 'md:ml-[30px]',
      chartOptions1: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            min: 20,
            max: 42,
          }
        },
      },
      chartOptions2: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            min: 0,
            max: 100,
          }
        },
      }
    }
  },
  methods: {
    checkWaterPump(temp, hum) {
      let currentTemperature = temp;
      let currentHumidity = hum;
      axios.post(this.checkWaterPumpUrl, {
        'temp': currentTemperature,
        'hum': currentHumidity
      })
        .then((res) => {
          console.log(res.data.result);
          this.showPopup = true;
          if (res.data.result == 0) {
            this.popupMessage = 'After checking, We see that the farm is in need of more water now'
          }
          else {
            this.popupMessage = "After checking, We see that the farm doesn't need to pump more water now"
          }
        })
    }
  }
}
</script>

<style></style>