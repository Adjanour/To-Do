import math
from numpy import log10


def colebrook_friction_func(NRe, f):
    relative_roughness = 2 * 0.000166
    return (1 / math.sqrt(f) + 2.0 * math.log10(relative_roughness + 18.7 / (NRe * math.sqrt(f))))


def func_derivative(NRe, f):
    # Define symbols for the sympy function
    relative_roughness = 2 * 0.000166

    # Define the derivative of the colebrook friction function w.r.t f
    derivative_of_friction_function = -0.5*(f**(3/2)) - 18.7/ ((NRe * f**(3/2)) * ( 0.00016 + (18.7/NRe*(f**0.5))))
    return derivative_of_friction_function

def colebrook_solver(NRe):
    # tol = 0.003
    # max_iter = 5
    f_init = 0.02
    function_val = colebrook_friction_func(NRe, f_init)
    derivative_val = func_derivative(NRe, f_init)
    f = f_init - function_val / derivative_val
    f_old = f


    while True:
        function_val = colebrook_friction_func(NRe, f_init)
        derivative_val = func_derivative(NRe, f_init)
        f = f_init - function_val / derivative_val
        if f < f_old:
            # it means friction factor is drawing close to zero
            break
        else:
            f_init = f + 0.2
            f_old = f
        return f


def main():
    rey_num = 12000
    friction_factor = colebrook_solver(rey_num)
    print("Friction factor is:", friction_factor)

if __name__ == "__main__":
    main()