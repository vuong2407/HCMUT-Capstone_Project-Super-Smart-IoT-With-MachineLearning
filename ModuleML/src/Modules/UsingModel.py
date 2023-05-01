
from tensorflow import keras
from keras.preprocessing.image import ImageDataGenerator
import numpy as np
from tensorflow.keras.applications.resnet50 import preprocess_input
import pandas as pd
import pickle

# Define a function to predict an image using the loaded model
def predict_image(image_path, model):
    img = keras.preprocessing.image.load_img(image_path, target_size=(200, 200))
    img_array = keras.preprocessing.image.img_to_array(img)
    img_array = np.expand_dims(img_array, axis=0)
    img_array = preprocess_input(img_array)
    prediction = model.predict(img_array)
    return prediction[0]

def handle_predict(model, data_dir, prediction):

    # Call the predict_image function for a test image
    train_dir = data_dir + "/train"
    train_datagen= ImageDataGenerator(shear_range=0.2,zoom_range=0.2,horizontal_flip=False,vertical_flip=False,fill_mode='nearest',width_shift_range=0.2,height_shift_range=0.2)
    train= train_datagen.flow_from_directory(train_dir,batch_size=128,target_size=(200,200),color_mode='rgb',class_mode='categorical',seed=42)

    # Print the predicted class
    class_indices = train.class_indices
    labels = list(class_indices.keys())
    predicted_class = labels[np.argmax(prediction)]
    return predicted_class

# Define a function to predict watering the plant
def predict_irrigation_pump(moisture, temperature):
    # Load the trained model
    with open('./Modules/irrigation_model.pkl', 'rb') as file:
        model = pickle.load(file)

    # Create a DataFrame with the input data
    input_data = pd.DataFrame({'moisture': [moisture], 'temp': [temperature]})

    # Make the prediction
    pump_prediction = model.predict(input_data)[0]

    return pump_prediction


    