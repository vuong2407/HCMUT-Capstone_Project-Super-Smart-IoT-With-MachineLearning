<template>
  <div  class="w-full flex flex-wrap justify-center ">
    <div class="flex flex-row justify-center mt-[10px] font-bold  ">
      <div> 
        <BarChart 
        :chart-data="show.humDataRender"
        :width= 500
        :height= 300
        :css-classes="cssClassesBar"
        />
        <div class="flex flex-row justify-center mt-[10px] font-bold"> DHT11</div>
      </div>
      <div>   
        <LineChart 
        class="ml-[30px]"
        :chart-data="show.temptDataLineRender"
        :width= 500
        :height= 300
        :css-classes="cssClassesLine"
        :chart-options="chartOptions1"
        />
        <div class="flex flex-row justify-center mt-[10px] font-bold"> LM35</div>
      </div>
    </div>
    <div  class="w-full flex flex-wrap justify-center ">
      <div class ="flex flex-row justify-center mt-[20px] mb-[20px]">
        <div>     
          <LineChart 
          :chart-data="show.moistureDataRender"
          :width="500"
          :height="300"
          :css-classes="cssClassesLine"
          :chart-options="chartOptions2"
          />
        <div class="flex flex-row justify-center mt-[10px] font-bold"> Soil Moisture</div>
        </div>
        <!-- {{state.moistureDataFirebase.datasets[0].data}} -->
        <div class="flex flex-col w-[500px] ml-[30px]">
          <div class="py-2 inline-block min-w-full">
            <table class="min-w-full bg-green-50">
              <thead class="border-b bg-gray-200">
                <tr>
                  <th scope="col" class="text-[18px] font-medium text-gray-900 px-6 py-3 text-left">
                    #
                  </th>
                  <th scope="col" class="text-[18px] font-medium text-gray-900 px-6 py-3 text-left">
                    Name
                  </th>
                  <th scope="col" class="text-[18px] font-medium text-gray-900 px-6 py-3 text-left">
                    Value
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr class="border-b">
                  <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                    LM35
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                    {{state.tempDataLineFirebase.datasets[0].data}} (°C)
                  </td>
                </tr>
                <tr class="border-b">
                  <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-gray-900">2</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                    DHT11
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                    {{state.humDataFirebase.datasets[1].data}} (%)
                  </td>
                </tr>
                <tr class="border-b">
                  <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-gray-900">3</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                    Soil Moisture
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                    {{state.moistureDataFirebase.datasets[0].data}} (%)
                  </td>
                </tr>
                <tr class="border-b">
                  <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-gray-900">4</td>
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
  props:{
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
      moistureDataFirebase :{
        time: "",
        datasets: [
          {
            data: []
          }
        ],
      },
      moistureDataCollection : [],
      tempDataCollection : [],
      tempDHT11DataCollection : [],
      HumDataCollection : [],
      humDataFirebase : {
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
              data: [] ,
              label: 'Threshold' ,
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
              data: [] ,
              label: 'Humidity (%)' ,
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
    onMounted (async() => {
      let chartDataLineSet =  chartDataLineCollection.on("value", snapshot => {
        state.chartDataLineFirebase = snapshot.val();
        console.log('update success')
      });
      let temptData =  LM35Collection.on("value", snapshot => {
        state.tempDataLineFirebase = snapshot.val();
        state.tempDataLineFirebase.time = new Date() ;
        state.tempDataCollection.push(state.tempDataLineFirebase.datasets[0].data)
        var d = new Date();
        show.temptDataLineRender.labels.push( d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds()) ;
        var lengthLabels = show.temptDataLineRender.labels.length;
        show.temptDataLineRender.datasets[1].data.push(38) ;
        console.log(lengthLabels);
        if ( lengthLabels > 4){
          // state.tempDataCollection.shift();
          // show.temptDataLineRender.datasets[0].data.shift();
          // show.temptDataLineRender.datasets[1].data.shift();
        }
        let obj = {
          name: 'LM35',
          device_id : '1',
          value : state.tempDataLineFirebase.datasets[0].data ,
          timestamp: d.toLocaleString() ,
        }
        firebase.firestore.collection('dataLM35').add(obj)
        .then(doc =>{
            obj.value= "";
            obj.timestamp = "";
          }).catch(e => {
            console.log(e);
          })
        });
      let humidityData = DHT11Collection.on("value", snapshot => {
        state.humDataFirebase = snapshot.val();
        state.tempDHT11DataCollection.push(state.humDataFirebase.datasets[0].data) ;
        state.HumDataCollection.push(state.humDataFirebase.datasets[1].data);
        var time = new Date();
        show.humDataRender.labels.push( time.getHours() + ':' + time.getMinutes() + ':' + time.getSeconds()) ;
        // console.log(state.humDataFirebase.datasets[0].data);
      });
      let moistureData = moistureCollection.on("value", snapshot => {
          state.moistureDataFirebase = snapshot.val();
          state.moistureDataFirebase.datasets[0].data = Math.round((4096 - state.moistureDataFirebase.datasets[0].data)*100/4096) ;
          state.moistureDataCollection.push(state.moistureDataFirebase.datasets[0].data);
          var time = new Date();   //check bien time
          show.moistureDataRender.labels.push( time.getHours() + ':' + time.getMinutes() + ':' + time.getSeconds()) ;
      })

      // state.chartDataLineFirebase = chartDataLineSet.val();

      show.temptDataLineRender.datasets[0].data = state.tempDataCollection ;
      show.humDataRender.datasets[0].data = state.tempDHT11DataCollection ;
      show.humDataRender.datasets[1].data = state.HumDataCollection ;
      show.moistureDataRender.datasets[0].data = state.moistureDataCollection ;
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
      // dataLm35: {
      //   device_id: "",
      //   value: "",
      //   timeUpdate: "",
      //   maxValue: "",
      //   minValue: "",
      // },
      cssClassesBar: 'bg-[#faebd7] rounded-[10px]' ,
      cssClassesLine: 'bg-[#faebd7] rounded-[10px]'  ,
      cssClassesDonut: 'ml-[30px]' ,
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
}
</script>

<style>

</style>