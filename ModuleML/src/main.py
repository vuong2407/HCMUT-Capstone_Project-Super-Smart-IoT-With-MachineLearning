from flask import Flask, request, redirect, jsonify
import os

ALLOWED_EXTENSIONS = set(['txt', 'pdf', 'png', 'jpg', 'jpeg', 'gif'])

def allowed_file(filename):
	return '.' in filename and filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS

app = Flask(__name__)
app.config['UPLOAD_FOLDER'] = "./images"
app.config['MAX_CONTENT_LENGTH'] = 16 * 1024 * 1024

@app.route("/")
def hello_world():
    return "Hello Wssorld"

def predict_diseases(pathImage):
    import Modules.UsingModel as UM
    from tensorflow import keras
    model = keras.models.load_model("./Modules/Model_2.h5")
    prediction = UM.predict_image(pathImage, model)
    data_dir = "./data/diseases/New Plant Diseases Dataset(Augmented)/New Plant Diseases Dataset(Augmented)"
    info = UM.handle_predict(model, data_dir, prediction).split("___")
    name_plant = info[0]
    info_disease = info[1].split("_")
    if (name_plant in info_disease):
        info_disease.remove(name_plant)
    return {
        "name": name_plant,
        "disease": ' '.join(info_disease)
    }

@app.route('/api/predict-diseases', methods=['POST'])
def upload_file():
	# check if the post request has the file part
	if 'file' not in request.files:
		resp = jsonify({'message' : 'No file part in the request'})
		resp.status_code = 400
		return resp
	file = request.files['file']
	if file.filename == '':
		resp = jsonify({'message' : 'No file selected for uploading'})
		resp.status_code = 400
		return resp
	if file and allowed_file(file.filename):
		filename = file.filename
		path = os.path.join(app.config['UPLOAD_FOLDER'], filename)
		file.save(path)
		resp = predict_diseases(path)
		os.remove(path)
		# resp = jsonify({'message' : 'File successfully uploaded'})
		# resp.status_code = 201
		return resp
	else:
		resp = jsonify({'message' : 'Allowed file types are txt, pdf, png, jpg, jpeg, gif'})
		resp.status_code = 400
		return resp

if __name__ == "__main__":
    app.run(host='0.0.0.0', port=5000, debug=True)