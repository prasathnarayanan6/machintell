import sys
import random
import pickle
import numpy as np
import pickle
mymodel = pickle.load(open('model.pkl','rb'))
LinearRegressionModel = pickle.load(open('LinearRegression.pkl','rb'))
LASSORegressionModel = pickle.load(open('LASSORegression.pkl','rb'))
AdaBoostModel = pickle.load(open('AdaBoost.pkl','rb'))
temp1 = float(sys.argv[1])
temp2 = float(sys.argv[2])
temp3 = float(sys.argv[3])
mymodelname = str(sys.argv[4])
ip = np.array([temp1,temp2,temp3]).reshape(1,3)
ans = float(0)
if mymodelname=='LinearRegression':
    ans = round((LinearRegressionModel.predict(ip))[0][0],4)
elif mymodelname=='LASSORegression':
    ans = round((LASSORegressionModel.predict(ip))[0],4)
elif mymodelname=='AdaBoost':
    ans = round((AdaBoostModel.predict(ip))[0],4)
print(ans)
#print("hello")
sys.stdout.flush()

