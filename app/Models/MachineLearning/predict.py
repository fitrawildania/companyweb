import sys
import joblib

# Ambil argumen dari command line
periode = int(sys.argv[1])

# Load model
model_cpu = joblib.load('app/Models/MachineLearning/model_cpu.joblib')
model_ram = joblib.load('app/Models/MachineLearning/model_ram.joblib')
model_hdd = joblib.load('app/Models/MachineLearning/model_hdd.joblib')

# Lakukan prediksi
cpu_prediction = model_cpu.predict([[periode]])
ram_prediction = model_ram.predict([[periode]])
hdd_prediction = model_hdd.predict([[periode]])

# Cetak hasil prediksi dalam format JSON
import json
print(json.dumps({
    'cpu_prediction': cpu_prediction[0],
    'ram_prediction': ram_prediction[0],
    'hdd_prediction': hdd_prediction[0]
}))