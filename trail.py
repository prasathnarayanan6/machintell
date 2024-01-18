# run_pickle.py
# import pickle
# import warnings
# from sklearn.exceptions import InconsistentVersionWarning
# warnings.simplefilter("ignore", InconsistentVersionWarning)
# from sklearn.linear_model import LinearRegression
# with open('LinearRegression.pkl', 'rb') as file:
#     data = pickle.load(file)
# print(data)
# # Print the coefficients
# print("Coefficients:", data.coef_)
# print("Intercept:", data.intercept_)

# run_pickle.py
import sys
import pickle
from sklearn.exceptions import InconsistentVersionWarning
from sklearn.linear_model import LinearRegression
import warnings

# Suppress version mismatch warning
warnings.simplefilter("ignore", InconsistentVersionWarning)

def load_and_predict(model_filename, params):
    # Load the pickled model
    with open(model_filename, 'rb') as file:
        loaded_model = pickle.load(file)

    # Print the coefficients
    print("Coefficients:", loaded_model.coef_)
    print("Intercept:", loaded_model.intercept_)

    # Example: Make a prediction with parameters provided by PHP
    new_data = [float(param) for param in params]
    prediction = loaded_model.predict([new_data])

    # Print the prediction
    print("Prediction:", prediction)

if __name__ == "__main__":
    # Access command-line arguments
    args = sys.argv[1:]

    if len(args) < 2:
        print("Usage: python trial.py <model_filename> <param1> <param2> ...")
        sys.exit(1)

    model_filename = args[0]
    params = args[1:]

    # Call the function to load and predict
    load_and_predict(model_filename, params)

